pulq-showcase
=============

This is a demo/test/dev project for [berlinonline/pulq](https://github.com/berlinonline/pulq). It is also a template for new projects.

## How to setup a new project

To setup a new project, you only need the `applicaitons/fe` directory. Everything else is only needed to setup a Vagrant VirtualBox for development.

```sh
    git clone --depth=1 git@github.com:berlinonline/pulq-showcase.git <dirname>
    cd <dirname>
    rm -rf .git
    # you can also move applications/fe into and existing project
    cd applications/fe
    make install
```

This will give you a copy of this showcase project on which you can build your own.

The old `.git` need to be removed before adding a new one with `git init`. That way you have your own fresh git repository to work with.

`make install` will install all dependencies via Composer and NPM and does the necessary steps so setup your application.
