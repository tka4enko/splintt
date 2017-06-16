// Combine all files in src/
module.exports = function(grunt) {

    grunt.initConfig({
        // uglify: {
        //   all_src : {
        //     options : {
        //       sourceMap : false,
        //       sourceMapName : 'sourceMap.map'
        //     },
        //     src : 'js/**/*.js',
        //     dest : 'vendor.js'
        //   }
        // }


        concat: {
            js: {
                //src: 'js/*.js',
                src: [
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/modernizr/modernizr.js',
                    'bower_components/jquery-ui/jquery-ui.js',
                    'bower_components/jquery.browser/dist/jquery.browser.js',
                    'bower_components/bootstrap/dist/js/bootstrap.js',
                    'bower_components/jquery-popup-overlay/jquery.popupoverlay.js',
                    'bower_components/js-cookie/src/js.cookie.js',
                    'bower_components/owl.carousel/dist/owl.carousel.js',
                    'bower_components/jquery-nice-select/js/jquery.nice-select.min.js',
                    'assets/js/edge.6.0.0.min.js',

                    
                    // 'bower_components/fancybox/source/jquery.fancybox.js',
                    // 'bower_components/select2/dist/js/select2.full.js',
                    // 'bower_components/mustache.js/mustache.js',
                    // 'assets/js/jquery.bootstrap.wizard.js',
                    // 'assets/js/jquery.makemecenter.js',
                    // 'assets/js/owl-carousel/owl.carousel.js',
                    // 'assets/js/garlic.js',
                    // 'assets/js/jquery.validate.js',
                    // 'bower_components/accounting.js/accounting.js',
                    'assets/js/common.js',
                    'assets/js/custom.js'
                ],
                dest: 'compiled/vendor.js'
            },
            css: {
                // src: 'js/css/*.css',
                src: [
                    'assets/css/icomoon.css',
                    'assets/css/fonts.css',
                    'bower_components/jquery-ui/themes/smoothness/jquery-ui.css',
                    'bower_components/font-awesome/css/font-awesome.css',
                    'bower_components/owl.carousel/dist/assets/owl.theme.default.css',
                    'assets/css/bootstrap.css',
                    'assets/js/owl-carousel/owl.carousel.css',
                    'bower_components/select2/dist/css/select2.css',
                    'bower_components/jquery-nice-select/css/nice-select.css',
                    'css_sass/helper.css',
                    'css_sass/global.css',
                    'css_sass/app.css',
                    // 'bower_components/fancybox/source/jquery.fancybox.css',
                    'style.css',
                ],
                dest: 'compiled/vendor.css'
            }
        },

        copy: {
            dist: {
                files: [
                    {
                        //for bootstrap fonts
                        expand: true,
                        dot: true,
                        cwd: 'assets/fonts/',
                        src: ['*.*'],
                        dest: 'compiled/fonts/',
                        filter: 'isFile'
                    },

                    {

                        //for font-awesome
                        expand: true,
                        dot: true,
                        cwd: 'bower_components/font-awesome/fonts/',
                        src: ['*.*'],
                        dest: 'compiled/fonts/',
                        filter: 'isFile'
                    },

                    {
                        expand: true,
                        dot: true,
                        cwd: 'bower_components/jquery-ui/themes/smoothness/images/',
                        src: ['**'],
                        dest: 'compiled/images/',
                        filter: 'isFile'
                    },

                    {
                        expand: true,
                        dot: true,
                        cwd: 'images/',
                        src: ['**'],
                        dest: 'compiled/images/',
                        filter: 'isFile'
                    },
                    // {
                    //     expand: true,
                    //     dot: true,
                    //     cwd: 'assets/js/owl-carousel/',
                    //     src: ['*.png','*.gif'],
                    //     dest: 'compiled/',
                    //     filter: 'isFile'
                    // }
                ]
            },
        },


        replace: {
            another_example: {
                src: ['compiled/vendor.css'],
                overwrite: true,
                replacements: [{
                    from: '../',
                    to: ""
                }]
            }
        },
        
		cssmin: {
			options: {
			  shorthandCompacting: false,
			  roundingPrecision: -1,
			  //keepSpecialComments: 0,
              processImport: false
			},
			target: {
			  files: {
			    'compiled/vendor.min.css': ['compiled/vendor.css']
			  }
			}
		},
		uglify: {
			my_target: {
			  files: {
			    'compiled/vendor.min.js': ['compiled/vendor.js']
			  }
			}
		},        


    });

	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-text-replace');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	
	grunt.registerTask('default', ['concat','copy','replace','cssmin','uglify']);
	grunt.registerTask('imageopt', ['imagemin']);
};