
Vagrant.configure("2") do |config|

 # os vendor
  config.vm.box= "ubuntu/bionic64"


#network, port mapping
  config.vm.network "forwarded_port", guest: 8080, host: 8080

# provisioners
  config.vm.provision "shell", inline: <<-SHELL
    sudo apt-get update
    sudo apt-get install -y docker.io docker-compose
    sudo usermod -aG docker vagrant
  SHELL

  config.vm.synced_folder ".", "/vagrant"


end
