module.exports = function(grunt) {

    // Dynamically loads all required grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
   
    grunt.initConfig({
        uglify: {
            options: {
                mangle: true,
                compress: true,
                preserveComments: 'some',
                sourceMap: true,
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
                    sourceMap: true,
                    sourceMapFilename: 'assets/css/main.min.css.map'
                },
                files: {
                    'assets/css/main.min.css': 'assets/less/main.less',
                }
            }
        },
        autoprefixer: {
            main: {
                src: 'assets/css/main.min.css',
                options: {
                    map: true,
                }
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
                files: [ 'assets/js/*.js' ],
                tasks: [ 'uglify:js', 'jshint:all' ],
                options: {
                    livereload: true,
                }
            },
            css: {
                files: [ 'assets/less/*.less' ],
                tasks: [ 'less:style', 'autoprefixer:main' ],
                options: {
                    livereload: true,
                }
            },
            png: {
                files: [ 'assets/images/*.png' ],
                tasks: [ 'tinypng' ]
            },
            php: {
                files: [ '*.php' ],
                options: {
                    livereload: true,
                }
            }
        },
        php: {
            server: {
                options: {
                    base: '../../..',
                    hostname: 'localhost',
                    port: 5000,
                    keepalive: true
                }
            }
        },
        concurrent: {
          dev: {
            tasks: [ 'php:server', 'watch' ],
            options: {
              logConcurrentOutput: true
            }
          }
        },
    });

    // Compiles LESS/JS and checks for todos
    grunt.registerTask('default', [
        'less',
        'autoprefixer',
        'jshint',
        'uglify',
        'todo'
    ]);

    grunt.registerTask( 'server', [ 'concurrent' ]);
};
