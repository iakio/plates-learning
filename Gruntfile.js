module.exports = function (grunt) {
    grunt.initConfig({
        sass: {
            dist: {
                files: {
                    'web/app.css': 'assets/sass/app.scss'
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-sass');
    grunt.registerTask('default', ['sass']);
};
