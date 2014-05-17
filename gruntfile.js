module.exports = function(grunt) {
 
    grunt.registerTask('watch', [ 'watch' ]);
   
    grunt.initConfig({
        uglify: {
            options: {
                mangle: true,
                compress: true,
                preserveComments: 'some'
            },
            js: {
                files: {
                    'assets/js/main.min.js': ['assets/js/main.js']
                }
            }
        },
        jshint: {
            all: ['Gruntfile.js', 'assets/js/main.js']
        },
        less: {
            style: {
                options: {
                    cleancss: true,
                },
                files: {
                    'assets/css/main.min.css': 'assets/less/main.less',
                }
            }
        },
        autoprefixer: {
            main: {
                src: 'assets/css/main.min.css'
            },
        },
        todo: {
            options: {
                file: "todo.md"
            },
            src: [
                '*.php',
                'assets/js/*.js',
                'assets/less/*.less'
            ],
        },

        // To use TinyPNG, get an API key from https://tinypng.com/developers
        // Don't forget to uncomment the task at the bottom of this file
        tinypng: {
            options: {
                apiKey: 'YOUR_API_KEY_HERE',
                checkSigs: true,
                sigFile: 'assets/images/file_sigs.json',
                summarize: true,
                showProgress: true
            },
            compress: {
                src: '*.png',
                cwd: 'assets/images/',
                dest: 'assets/images/',
                expand: true
            }
        },
        watch: {
            js: {
                files: ['assets/js/*.js'],
                tasks: ['uglify:js', 'jshint:all'],
                options: {
                    livereload: true,
                }
            },
            css: {
                files: [
                    'assets/less/*.less',
                ],
                tasks: ['less:style', 'autoprefixer:main'],
                options: {
                    livereload: true,
                }
            },
            all: {
                files: [
                    '*.php',
                    'assets/js/*.js',
                    'assets/less/*.less',
                ],
                tasks: ['todo']
            },
            png: {
                files: [
                    'assets/images/*.png'
                ],
                tasks: ['tinypng']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-notify');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-todo');
    // grunt.loadNpmTasks('grunt-tinypng');
    grunt.loadNpmTasks('grunt-contrib-jshint');
};
