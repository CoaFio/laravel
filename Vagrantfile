Vagrant.configure("2") do |config|

    config.vm.box = "ubuntu/xenial64"

    config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

    #try to install apach before setting group
    config.vm.provision "shell", inline: <<-SHELL
        apt-get install -y apache2
    SHELL

    config.vm.synced_folder "./" , "/var/www/html/", owner:"vagrant", group:"www-data", mount_option:["dmode=775","fmode=644"]

    config.vm.provision "shell", inline: <<-SHELL

        DBPASSWD=MySuperPassword
        
        apt-get update

        apt-get -y install vim curl build-essential 2>&1 | tee /vagrant/vm_build.log

        apt-get install -y apache2

        echo -e "\n--- Install MySQL ---\n"
        debconf-set-selections <<< 'mysql-server mysql-server/root_password password $DBPASSWD'
        debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password $DBPASSWD'
        sudo apt-get install -y mysql-server 2>&1 | tee /vagrant/vm_build.log

        sudo apt-get -y install php libapache2-mod-php php-mcrypt php-mysql php-mbstring php-xml php-zip 2>&1 | tee /vagrant/vm_build.log

        curl https://getcomposer.org/installer 2>&1 | tee /vagrant/vm_build.log
        mv composer.phar /usr/local/bin/composer

        #install laravel?
    SHELL

end
