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
                command: path.normalize('vendor/bin/phpunit')
            },
            smartrunner: {
                file: "tests/StaticPagesTest.php",
                command: function () {
                    return "vendor\\bin\\smartrunner " +
                        grunt.config.get('shell.smartrunner.file');
                }
            }

        },
        esteWatch: {
            options: {
                dirs: [
                    'assets/sass/**/',
                    'src/**/',
                    'templates/**/',
                    'tests/**/',
                ]
            },
            php: function (filePath) {
                grunt.config("shell.smartrunner.file", filePath);
                return ['shell:smartrunner'];
            },
            scss: function (filepath) {
                return ['sass:dist'];
            },
        },
    });
    grunt.loadNpmTasks('grunt-este-watch');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-shell');
    grunt.registerTask('default', ['sass']);
};
