Exec { path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ] }

# set our default package provider
Package { provider => 'apt' }

# set projects base directory, which is also exported to nfs.
$hosting_root = "/home/vagrant/projects"
$project_basedir = "${hosting_root}/showcase"

# define our concrete box configuration
class { 'boxes::devbox-php-elasticsearch': }
-> showcase::application { 'pulq-showcase.local':
    app_docroot => "${project_basedir}/applications/portal/pulq/pub"
}

require converjon::server
