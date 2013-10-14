define showcase::application (
  $app_name = $title,
  $app_docroot = '/home/vagrant/projects/showcase/applications/fe/pulq/pub'
) {

  nginx::site { "${app_name}":
    name => $app_name,
    docroot => "${app_docroot}"
  }

  file {
    "/home/vagrant/init_fe.sh":
      ensure  => present,
      mode    => '0744',
      owner   => 'vagrant',
      group   => 'vagrant',
      content => template('showcase/init_fe.sh.erb');
  }

  package { 'sass':
    ensure   => 'installed',
    provider => 'gem',
  }
}
