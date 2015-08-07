var path = require('path');
module.exports = function (grunt) {
    grunt.initConfig({
        sass: {
            dist: {
                files: {
                    'web/app.css': 'assets/sass/app.scss'
                }
            }
        },
        shell: {
            phpunit: {
                command: path.normalize('vendor/bin/phpunit') + ' tests'
            }
        },
        watch: {
            phpunit: {
                files: 'tests/**/*.php',
                tasks: ['shell:phpunit']
            }
        }
    });
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', ['sass']);
};
