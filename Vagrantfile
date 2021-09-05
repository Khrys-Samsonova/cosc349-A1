# -*- mode: ruby -*-
# vi: set ft=ruby :

# Taken from Lab 6 as a skeleton for the assignment. 


# A Vagrantfile to set up two VMs, a webserver and a database server,
# connected together using an internal network with manually-assigned
# IP addresses for the VMs.

Vagrant.configure("2") do |config|
  # (We have used this box previously, so reusing it here should save a
  # bit of time by using a cached copy.)
  config.vm.box = "ubuntu/xenial64"

  # have to increase to fix the timeout issue (since my laptop struggles)
  config.vm.boot_timeout = 2400


  
  config.vm.define "webserver" do |webserver|
    # These are options specific to the webserver VM
    webserver.vm.hostname = "webserver"

    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    
    webserver.vm.network "private_network", ip: "192.168.2.11"

    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    webserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
            
      cp /vagrant/test-website.conf /etc/apache2/sites-available/
      # activate our website configuration ...
      a2ensite test-website
      # ... and disable the default website provided with Apache
      a2dissite 000-default
      # Reload the webserver configuration, to pick up our changes
      service apache2 reload
    SHELL
  end

  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    dbserver.vm.network "private_network", ip: "192.168.2.12"
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    
    dbserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      
      export MYSQL_PWD='insecure_mysqlroot_pw'

      echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
      echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

      apt-get -y install mysql-server

      echo "CREATE DATABASE fvision;" | mysql

      echo "CREATE USER 'webuser'@'%' IDENTIFIED BY 'insecure_db_pw';" | mysql

      echo "GRANT ALL PRIVILEGES ON fvision.* TO 'webuser'@'%'" | mysql
      
      export MYSQL_PWD='insecure_db_pw'

      cat /vagrant/setup-database.sql | mysql -u webuser fvision

      sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf


      service mysql restart
    SHELL
  end
  
  # Here we are defining the admin virtual machine
  # this machine is essentially a user with full admin privileges
  config.vm.define "admin" do |admin|
    admin.vm.hostname = "admin"
    
    # Set up vm to listen on different port with a different ip address from webserver
    # we also tried 127.0.0.2 as an IP, but this would cause an error that "admin website could not be found"
    admin.vm.network "forwarded_port", guest: 81, host: 8081, host_ip: "127.0.0.1"

    # Setting up the IP address using the patterns from above
    admin.vm.network "private_network", ip: "192.168.2.13"
    admin.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # Setting up the shell provisions for admin - at this point, same as user
    admin.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2 php libapache2-mod-php php-mysql

      # Below is copied and pasted from the webserver
      # at this moment, it generates a copy of the user website
      # Change VM's admin's configuration to use shared folder.
      # (Look inside test-website.conf for specifics.)
      cp /vagrant/admin-website.conf /etc/apache2/sites-available/
      # activate our website configuration ...
      a2ensite admin-website
      # ... and disable the default website provided with Apache
      a2dissite 000-default
      # Reload the webserver configuration, to pick up our changes
      service apache2 reload
    SHELL
  end

end

#  LocalWords:  webserver xenial64
