'use strict';

angular
  .module('app', [
    'oc.lazyLoad',
    'ui.router',
    'ui.bootstrap',
    'angular-loading-bar',
    'ngMessages',
    'ui-notification',
    'angularUtils.directives.dirPagination',
    'angularFileUpload',
    'simditor',
    'ngSanitize',
    'angular-md5',
    'pascalprecht.translate',
  ])
  .config(['$stateProvider','$urlRouterProvider','$ocLazyLoadProvider' ,'$locationProvider',
           'NotificationProvider', '$translateProvider',
      function ($stateProvider,$urlRouterProvider,$ocLazyLoadProvider,$locationProvider, NotificationProvider, $translateProvider) {

      NotificationProvider.setOptions({
          delay: 2000,
          startTop: 20,
          startRight: 10,
          verticalSpacing: 20,
          horizontalSpacing: 20,
          positionX: 'right',
          positionY: 'bottom'
      });

      $translateProvider.translations('en', {
          Dashboard: 'Dashboard',
          Brand: 'Brands',
          Category: 'Categories',
          Item: 'Items',
          Setting: 'Settings',
          Profile: 'User Profile',
          Slide: 'Change Slide',
          Language: 'Languages',
          BUTTON_LANG_EN: 'English',
          BUTTON_LANG_DE: 'Khmer',
          BUTTON_NEW: 'Create New',
          BUTTON_BACK: 'Back',
          SEARCH: 'Search',
          No: 'No',
          Name: 'Name',
          Description: 'Description',
          Date: 'Date',
          Status: 'Status',
          Action: 'Action',
          Active: 'Active',
          Disable: 'Disable',
          Enable: 'Enable',
          View: 'View',
          Update: 'Update',
          Delete: 'Delete',
          Edit_Brand: 'Edit Brand',
          Create_Brand: 'Create Brand',
          Disable_Brand: 'Disable Brand',
          Create_Category: 'Create Category',
          Edit_Category: 'Edit Category',
          Disable_Category: 'Disable Category',
          BUTTON_CLOSE: 'Close',
          BUTTON_SAVE: 'Save',
          Remove_Brand: 'Remove Brand',
          Remove_Category: 'Remove Category',
          Message_brand: 'Are you want to disable this brand?',
          Remove_Message: 'Are you want to delete this brand?',
          No_Brand: 'No Brand Found',
          Brand_Name : 'Brand Name',
          No_Category: 'No Category Found',
          Select: 'Select',
          Category_Disable_Message: 'Are you want to disable this category?',
          Category_Remove_Message: 'Are you want to delete this category?',
          Item_Code: 'Code',
          Item_Price: 'Price',
          Category_Name : 'Category',
          No_Item_Found : 'No Item Found',
          Disable_Item : 'Disable Item',
          Remove_Item : 'Remove Item',
          Item_Remove_Message : 'Are you want to remove this item?',
          Disable_Item_Message : 'Are you want to disable this item?',
          Setup_Contact : 'Setup Contact',
          Phone: 'Phone Number',
          Email: 'Email',
          No_Contact_Found : 'No Contact Found',
          Address1 : 'Address1',
          Address2 : 'Address2',
          Country : 'Country',
          State : 'State',
          Location : 'Location',
          View_Contact : 'View Contact',
          Address : 'Address',
          Remove_Contact : 'Remove Contact',
          Edit_Contact : 'Edit Contact',
          Disable_Contact : 'Disable Contact',
          Remove_Message_Contact : 'Are you want to delete this contact?',
          Disable_Message_Contact : 'Are you want to disable this contact?',
          User_Profile : 'Profile',
          Edit : 'Edit',
          Edit_Profile : 'Edit Profile',
          Password : 'Password',
          Show_Password : 'Show Password',
          Hide_Password : 'Hide Password',
          Disable_Profile : 'Disable Profile',
          Enable_Profile : 'Enable Profile',
          Disable_Message : 'Are you want to disable this user profile?',
          Enable_Message : 'Are you want to enable this user profile?',
          Slider : 'Slide',
          Photo : 'Photo Slide',
          Image_Size : 'Size',
          Image_Type : 'Type',
          Uploads_Only_Images : 'Uploads only images',
          Item_Must_Be_Have_One_Image : 'Item must be have one image (upload one image is required)',
          Image_Length : 'Image length:',
          Progress : 'Progress',
          Upload_All : 'Upload All',
          Cancel_All : 'Cancel All',
          Remove_All : 'Remove All',
          Upload : 'Upload',
          Cancel : 'Cancel',
          No_Photo_Slide : 'No Photo Slide',
          Remove_Button : 'Remove',
          Delete_Slide : 'Delete Slide',
          Slide_Message : 'Are you want to remove this slide?',
          Language_Title : 'Language',
          Item_Management : 'Item Management',
          Brand_Type : 'Brand Type',
          Item_Color : 'Color',
          Item_Type : 'Type',
          Specification : 'Specification',
          Contact_Owner : 'Contact Owner',
          No_Photo_Found : 'No Photo Found',
          Photo_Item : 'Photo',
          Remove_Photo : 'Remove Photo',
          Remove_Photo_Message : 'Are you want to remove this photo?',
          BUTTON_NEXT : 'Next',

      });
      $translateProvider.translations('de', {
          Dashboard: 'ផ្ទាំងគ្រប់គ្រង',
          Brand: 'ម៉ាក',
          Category: 'ប្រភេទ',
          Item: 'ផលិតផល',
          Setting: 'ការកំណត់',
          Profile: 'អ្នកប្រើប្រាស់',
          Slide: 'ផ្លាស់ប្តូរស្លាយ',
          Language: 'ភាសា',
          BUTTON_LANG_EN: 'អង់គ្លេស',
          BUTTON_LANG_DE: 'ភាសារខ្មែរ',
          BUTTON_NEW: 'បង្កើត​ថ្មី',
          BUTTON_BACK: 'ត្រទ្បប់',
          SEARCH: 'ស្វែងរក',
          No: 'សំគាល់',
          Name: 'ឈ្មោះ',
          Description: 'ការពិពណ៌នា',
          Date: 'កាលបរិច្ឆេទ',
          Status: 'ស្ថានភាព',
          Action: 'សកម្មភាព',
          Active: 'សកម្ម',
          Disable: 'បិទ',
          Enable: 'បើក',
          View: 'មើលលំអិត',
          Update: 'កែប្រែ',
          Delete: 'លុប',
          Edit_Brand: 'កែប្រែម៉ាក',
          Create_Brand: 'បង្កើតម៉ាកថ្មី',
          Disable_Brand: 'បិទម៉ាក',
          BUTTON_CLOSE: 'បិទ',
          BUTTON_SAVE: 'រក្សាទុក',
          Remove_Brand: 'លុបម៉ាក',
          Message_brand: 'តើអ្នកចង់បិទម៉ាកនេះ?',
          Remove_Message: 'តើអ្នកចង់លុបម៉ាកនេះមែនទេ?',
          No_Brand: 'រកមិនឃើញម៉ាក',
          Brand_Name : 'ឈ្មោះម៉ាក',
          No_Category: 'រកមិនឃើញប្រភេទ',
          Create_Category: 'បង្កើតប្រភេទថ្មី',
          Edit_Category: 'កែប្រែប្រភេទ',
          Disable_Category: 'បិទប្រភេទ',
          Select: 'ជ្រើរើស',
          Category_Disable_Message: 'តើអ្នកចង់បិទប្រភេទនេះមែនទេ?',
          Category_Remove_Message: 'តើអ្នកចង់លុបប្រភេទនេះមែនទេ?',
          Remove_Category: 'លុបប្រភេទ',
          Item_Code: 'លេខកូដផលិតផល',
          Item_Price: 'តម្លៃ',
          Category_Name : 'ឈ្មោះប្រភេទ',
          No_Item_Found : 'រកមិនឃើញផលិតផល',
          Disable_Item : 'បិទផលិតផល',
          Remove_Item : 'លុបផលិតផល',
          Item_Remove_Message : 'តើអ្នកពិតជាចង់លុបផលិតផលនេះមែនទេ?',
          Disable_Item_Message : 'តើអ្នកពិតជាចង់បិទផលិតផលនេះមែនទេ?',
          Setup_Contact : 'បង្កើតទំនាក់ទំនង',
          Phone: 'លេខទូរស័ព្ទ',
          Email: 'អ៊ីមែល',
          No_Contact_Found : 'រកមិនឃើញទំនាក់ទំនង',
          Address1 : 'អាសយដ្ឋានទីមួយ',
          Address2 : 'អាសយដ្ឋានទីពីរ',
          Country : 'ក្រុង ឬ​ ខេត្ដ',
          State : 'ខណ្ឌ​ ឬ ស្រុក',
          Location : 'សង្កាត់ ឬ ឃុំ',
          View_Contact : 'មើលទំនាក់ទំនងលំអិត',
          Address : 'អាសយដ្ឋាន',
          Remove_Contact : 'លុបទំនាក់ទំនង',
          Disable_Contact : 'បិទទំនាក់ទំនង',
          Remove_Message_Contact : 'តើអ្នកចង់លុបទំនាក់ទំនងនេះឬ?',
          Disable_Message_Contact : 'តើអ្នកចង់បិទទំនាក់ទំនងនេះមែនទេ?',
          Edit_Contact : 'កែប្រែទំនាក់ទំនង',
          User_Profile : 'ប្រវត្ដរូបអ្នកប្រើប្រាស់',
          Edit : 'កែប្រែ',
          Edit_Profile : 'កែប្រែអ្នកប្រើប្រាស់',
          Password : 'ពាក្យសម្ងាត់',
          Show_Password : 'បង្ហាញពាក្យសម្ងាត់',
          Hide_Password : 'លាក់ពាក្យសម្ងាត់',
          Disable_Profile : 'បិទប្រវត្តិរូប',
          Enable_Profile : 'បើកប្រវត្តិរូប',
          Disable_Message : 'តើអ្នកពិតជាចង់បិទអ្នកប្រើប្រាស់នេះមែនទេ?',
          Enable_Message : 'តើអ្នកពិតជាចង់បើកអ្នកប្រើប្រាស់នេះមែនទេ?',
          Slider : 'រូបភាពស្លាយ',
          Photo : 'រូបភាព',
          Image_Size : 'ទំហំ',
          Image_Type : 'ប្រភេទរូប',
          Uploads_Only_Images : 'ផ្ទុកតែរូបភាពប៉ុណ្ណោះ',
          Item_Must_Be_Have_One_Image : 'ផលិតផលត្រូវតែមានរូបភាពមួយ (តម្រូវឱ្យដាក់រូបភាពមួយឡើង)',
          Image_Length : 'ចំនួនរូបភាព',
          Progress : 'ដំណើរការ',
          Upload_All : 'បញ្ចូលទំាងអស់',
          Cancel_All : 'បោះបង់ទាំងអស់',
          Remove_All : 'លុបចេញទំាងអស់',
          Upload : 'បញ្ចូល',
          Cancel : 'បោះបង់',
          Remove_Button : 'លុប',
          No_Photo_Slide : 'គ្មានស្លាយរូបភាព',
          Delete_Slide : 'លុបរូបស្លាយ',
          Slide_Message : 'តើអ្នកចង់លុបរូបស្លាយនេះមែនទេ?',
          Language_Title : 'ភាសារ',
          Item_Management : 'ការគ្រប់គ្រងផលិតផល',
          Brand_Type : 'ម៉ាកផលិតផល',
          Item_Color : 'ពណ៌ផលិតផល',
          Item_Type : 'ប្រភេទ (ចាស់ ឬ ថ្មី​)',
          Specification : 'លក្ខណះពិសេសរបស់ផលិតផល',
          Contact_Owner : 'ទាក់ទងម្ចាស់',
          No_Photo_Found : 'រកមិនឃើញរូបថត',
          Photo_Item : 'រូបផលិតផល',
          Remove_Photo : 'លុបរូបផលិតផល',
          Remove_Photo_Message : 'តើអ្នកចង់លុបរូបថតនេះចេញឬ?',
          BUTTON_NEXT : 'បន្ទាប់',
      });
      $translateProvider.preferredLanguage('en');

    $locationProvider.html5Mode(false);
    $locationProvider.hashPrefix("");
    $ocLazyLoadProvider.config({
      debug:false,
      events:true,
    });

    $urlRouterProvider.otherwise('/dashboard/home');

    $stateProvider
      .state('dashboard', {
        url:'/dashboard',
        templateUrl: 'backend/app/views/dashboard/main.html',
        resolve: {
            loadMyDirectives:function($ocLazyLoad){
                return $ocLazyLoad.load(
                {
                    name:'app',
                    files:[
                    'backend/app/scripts/directives/header/header.js',
                    'backend/app/scripts/directives/header/header-notification/header-notification.js',
                    'backend/app/scripts/directives/sidebar/sidebar.js',
                    'backend/app/scripts/directives/sidebar/sidebar-search/sidebar-search.js'
                    ]
                }),
                $ocLazyLoad.load(
                {
                   name:'toggle-switch',
                   files:["bower_components/angular-toggle-switch/angular-toggle-switch.min.js",
                          "bower_components/angular-toggle-switch/angular-toggle-switch.css"
                      ]
                }),
                $ocLazyLoad.load(
                {
                  name:'ngAnimate',
                  files:['bower_components/angular-animate/angular-animate.js']
                })
                $ocLazyLoad.load(
                {
                  name:'ngCookies',
                  files:['bower_components/angular-cookies/angular-cookies.js']
                })
                $ocLazyLoad.load(
                {
                  name:'ngResource',
                  files:['bower_components/angular-resource/angular-resource.js']
                })
                $ocLazyLoad.load(
                {
                  name:'ngSanitize',
                  files:['bower_components/angular-sanitize/angular-sanitize.js']
                })
                $ocLazyLoad.load(
                {
                  name:'ngTouch',
                  files:['bower_components/angular-touch/angular-touch.js']
                })
            }
        }
    })

      .state('dashboard.home',{
        url:'/home',
        controller: 'MainCtrl',
        templateUrl:'backend/app/views/dashboard/home.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({
              name:'app',
              files:[
              'backend/app/scripts/controllers/main.js',
              'backend/app/scripts/directives/timeline/timeline.js',
              'backend/app/scripts/directives/notifications/notifications.js',
              'backend/app/scripts/directives/chat/chat.js',
              'backend/app/scripts/directives/dashboard/stats/stats.js'
              ]
            })
          }
        }
      })


    .state('dashboard.productCategory',{
        url:'/category',
        controller: 'ProductCategoryCtrl',
        templateUrl:'backend/app/views/categories/index.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/categories/category.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.productCategory-view',{
        url:'/category/view/:id',
        controller: 'ProductCategoryDetailCtrl',
        templateUrl:'backend/app/views/categories/detail.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/categories/category-detail.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.brand',{
        url:'/brand',
        controller: 'BrandCtrl',
        templateUrl:'backend/app/views/brands/brand.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/brands/brand.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.brand-view',{
        url:'/brand/view/:id',
        controller: 'BrandDetailCtrl',
        templateUrl:'backend/app/views/brands/brand-detail.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/brands/brand-detail.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.product',{
        url:'/product',
        controller: 'ProductCtrl',
        templateUrl:'backend/app/views/products/product.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/products/product.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.product-create',{
        url:'/product/create',
        controller: 'ProductCreateCtrl',
        templateUrl:'backend/app/views/products/create.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/products/create.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.product-upload',{
        url:'/product/upload',
        controller: 'ProductUploadCtrl',
        templateUrl:'backend/app/views/products/upload-photo.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/products/upload.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.product-edit',{
        url:'/product/edit/:id',
        controller: 'ProductEditCtrl',
        templateUrl:'backend/app/views/products/edit.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/products/edit.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.product-edit-upload',{
        url:'/product/upload/:id',
        controller: 'ProductEditUploadCtrl',
        templateUrl:'backend/app/views/products/edit-upload-photo.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/products/edit-upload.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.product-view',{
        url:'/product/view/:id',
        controller: 'ProductDetailCtrl',
        templateUrl:'backend/app/views/products/detail.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/products/detail.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.profile',{
        url:'/profile',
        controller: 'ProfileCtrl',
        //templateUrl:'backend/app/views/profiles/register.blade.php',
        templateUrl:'backend/app/views/profiles/profile.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/profiles/profile.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.setting',{
        url:'/setting',
        controller: 'SettingCtrl',
        templateUrl:'backend/app/views/profiles/setting.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/profiles/setting.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.cover',{
        url:'/cover',
        controller: 'CoverCtrl',
        templateUrl:'backend/app/views/profiles/cover.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/profiles/cover.js'
                    ]
                })
            }
        }
    })

    .state('dashboard.language',{
        url:'/language',
        controller: 'LanguageCtrl',
        templateUrl:'backend/app/views/profiles/language.html',
        resolve: {
            loadMyFiles:function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name:'app',
                    files:[
                        'backend/app/scripts/controllers/profiles/language.js'
                    ]
                })
            }
        }
    })

      .state('dashboard.form',{
        templateUrl:'backend/app/views/form.html',
        url:'/form'
    })
      .state('dashboard.blank',{
        templateUrl:'backend/app/views/pages/blank.html',
        url:'/blank'
    })
      .state('login',{
        templateUrl:'backend/app/views/pages/login.html',
        url:'/login'
    })
    //  .state('dashboard.chart',{
    //    templateUrl:'backend/app/views/chart.html',
    //    url:'/chart',
    //    controller:'ChartCtrl',
    //    resolve: {
    //      loadMyFile:function($ocLazyLoad) {
    //        return $ocLazyLoad.load({
    //          name:'chart.js',
    //          files:[
    //            'bower_components/angular-chart.js/dist/angular-chart.min.js',
    //            'bower_components/angular-chart.js/dist/angular-chart.css'
    //          ]
    //        }),
    //        $ocLazyLoad.load({
    //            name:'sbAdminApp',
    //            files:['backend/app/scripts/controllers/chartContoller.js']
    //        })
    //      }
    //    }
    //})
      .state('dashboard.table',{
        templateUrl:'backend/app/views/table.html',
        url:'/table'
    })
      .state('dashboard.panels-wells',{
          templateUrl:'backend/app/views/ui-elements/panels-wells.html',
          url:'/panels-wells'
      })
      .state('dashboard.buttons',{
        templateUrl:'backend/app/views/ui-elements/buttons.html',
        url:'/buttons'
    })
      .state('dashboard.notifications',{
        templateUrl:'backend/app/views/ui-elements/notifications.html',
        url:'/notifications'
    })
      .state('dashboard.typography',{
       templateUrl:'backend/app/views/ui-elements/typography.html',
       url:'/typography'
   })
      .state('dashboard.icons',{
       templateUrl:'backend/app/views/ui-elements/icons.html',
       url:'/icons'
   })
      .state('dashboard.grid',{
       templateUrl:'backend/app/views/ui-elements/grid.html',
       url:'/grid'
   })
  }]);

    
