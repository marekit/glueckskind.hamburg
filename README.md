
# glueckskind.hamburg

## Setup 

Add these entries to your /etc/hosts file.

 `192.168.56.128    ahoi.glueckskind.hamburg`

 `192.168.56.128    ahoi.html.glueckskind.hamburg`

Cd into this directory and type in `vagrant up`

After ansible has provisioned the vm managed by vagrant use `vagrant ssh`
to get into the vm.

Cd into `/vagrant/src` and execute `composer install`

Cd into `/vagrant/html` and execute:

Now you should be able to visit the application at:
`http://ahoi.glueckskind.hamburg`

And the frontend html prototype at:
`http://ahoi.html.glueckskind.hamburg`
  