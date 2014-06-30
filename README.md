pulq-showcase
=============

This is a demo/test/dev project for [berlinonline/pulq](https://github.com/berlinonline/pulq). It is also a template for new projects.

## How to setup a new project

    git clone --depth=1 git@github.com:berlinonline/pulq-showcase.git <dirname>
    cd <dirname>
    rm -rf .git
    git init
    make install
    
This will give you a copy of this showcase project on which you can build your own.

The old `.git` need to be removed before adding a new one with `git init`. That way you have your own fresh git repository to work with.

`make install` will install all dependencies via Composer and NPM and does the necessary steps so setup your application.
