
'use strict';

angular
    .module('app', [
        'angularUtils.directives.dirPagination',
        'rt.encodeuri',
        'angular-loading-bar',
        'ui.bootstrap',
        'pascalprecht.translate',
    ])
    .config(['$interpolateProvider', '$translateProvider',
        function ($interpolateProvider, $translateProvider) {

            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');

            $translateProvider.translations('en', {
                BUTTON_LANG_EN: 'English',
                BUTTON_LANG_DE: 'Khmer',
                About_Menu : 'About',
                Contact_Menu : 'Contact',
                Post_Item : 'POST',
                Select : 'Select',
                Go : 'Go',
                Welcome : 'Welcome!',
                Brand_Type : 'BRAND TYPES',
                Item : 'ALL ITEMS',
                Sort_By : 'Sort By',
                Payment_Method : 'Payment Methods',
                Item_Name_A_Z : 'Item Name A - Z',
                Item_Price_Low_Up : 'Item Price lowest to Highest',
                Item_Cate_Name_A_Z : 'Category Name A - Z',
                Button_View_Detail : 'View Detail',
                Available : 'Available',
                Not_Available : 'Not Available',
                Item_New : 'New',
                Item_Used : 'Used',
                SOCIAL_MEDIA : 'SOCIAL MEDIA',
                Home : 'Home',
                Item_Detail : 'Item Detail',
                Add_To_Card : 'Add to card',
                Item_Information : 'Item Information',
                Contact_Information : 'Contact Information',
                Contact_Detail : 'Contact Detail',
                Related_Item : 'Related Item',
                More_Detail : 'More Detail',
                Brand : 'Brand',
                Category : 'Category',
                Model : 'Model',
                Released_On : 'Released On',
                Specification : 'Specification',
                Name : 'Name',
                Number : 'Number',
                Email : 'Email',
                Address : 'Address',
                Qty : 'Qty',
                Color : 'Color',
                Dollar : '$',
                Visit_Us : 'Visit Us',
                Opening_Hours : 'Opening Hours',
                Email_Us : 'Email Us',
                Subject : 'Subject',
                Send_Message : 'Send Message',
                Mon_Fri : 'Monday - Friday',
                Saturday : 'Saturday',
                Sunday : 'Sunday',
            });
            $translateProvider.translations('de', {
                BUTTON_LANG_EN: 'អង់គ្លេស',
                BUTTON_LANG_DE: 'ភាសារខ្មែរ',
                About_Menu : 'អំពីយើង',
                Contact_Menu : 'ទំនាក់ទំនង',
                Post_Item : 'លក់ផលិតផល',
                Select : 'ជ្រើសរើស',
                Go : 'ស្វែងរក',
                Welcome : 'សូមស្វាគមន៍!',
                Brand_Type : 'ម៉ាកផលិតផល',
                Item : 'ផលិតផលទំាងអស់',
                Sort_By : 'តម្រៀបតាម',
                Payment_Method : 'វិធីសាស្រ្ដទូទាត់ប្រាក់',
                Item_Name_A_Z : 'ឈ្មោះផលិតផលពី A - Z',
                Item_Price_Low_Up : 'តម្លៃផលិតផលទាបបំផុតទៅខ្ពស់បំផុត',
                Item_Cate_Name_A_Z : 'ឈ្មោះប្រភេទនៃផលិតផលពី A - Z',
                Button_View_Detail : 'មើលពត៌មានលំអិត',
                Available : 'ផលិតផលនេះនៅមានលក់',
                Not_Available : 'ផលិតផលនេះត្រូវបានដកចេញ',
                Item_New : 'ថ្មី',
                Item_Used : 'បានប្រើហើយ',
                SOCIAL_MEDIA : 'ប្រព័ន្ធ​ផ្សព្វផ្សាយ​សង្គម',
                Home : 'ទំព័រដើម',
                Item_Detail : 'ផលិតផលលំអិត',
                Add_To_Card : 'បន្ថែមកាត',
                Item_Information : 'ព័ត៌មានផលិតផល',
                Contact_Information : 'ព័ត៌មានទំនាក់ទំនង',
                Contact_Detail : 'ព័ត៌មានទំនាក់ទំនងលំអិត',
                Related_Item : 'ទាក់ទងផលិតផល',
                More_Detail : 'បន្ថែមព័ត៌មានលំអិត',
                Brand : 'ម៉ាក',
                Category : 'ប្រភេទ',
                Model : 'ផលិតផល',
                Released_On : 'បានចេញផ្សាយនៅថ្ងៃទី',
                Specification : 'ការបញ្ជាក់ពីផលិតផល',
                Name : 'ឈ្មោះ',
                Number : 'លេខទូរស័ព្ទ',
                Email : 'អ៊ីមែល',
                Address : 'អាសយដ្ឋាន',
                Qty : 'ចំនួន',
                Color : 'ពណ៌',
                Dollar : 'ដុល្លារ',
                Visit_Us : 'មកលេង​ពួក​យើង',
                Opening_Hours : 'ម៉ោងធ្វើការ',
                Email_Us : 'អ៊ីម៉ែលមកកាន់ពួកយើង',
                Subject : 'ប្រធានបទ',
                Send_Message : 'ផ្ញើ​សារ',
                Mon_Fri : 'ថ្ងៃច័ន្ទដល់ថ្ងៃសុក្រ',
                Saturday : 'ថ្ងៃសៅរ៍',
                Sunday : 'ថ្ងៃអាទិត្យ',
            });
            $translateProvider.preferredLanguage('en');

        }])

    .config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
        cfpLoadingBarProvider.parentSelector = '#loading-bar-container';
    }])


