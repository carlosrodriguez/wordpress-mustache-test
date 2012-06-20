/*
* global.js
*
* ---------
*
*/

/*** TABLE OF CONTENTS ***
*
* 1. Utils
* 2. Init
*/


/* 1. Util
----------------------------------------------------------------------------------------------------*/



/* 2. Utils
----------------------------------------------------------------------------------------------------*/

var BGT = BGT || {};

BGT.util = (function ($, me) {

  /*
  * @function
  * @name getTemplate
  * @description Use mustache to grab and render HTML
  * @param {String} templateUrl
  * @param {String} data
  *
  */
  me.getTemplate = function (params, callback) {
    $.ajax({
      url: params.templateUrl,
      dataType: 'html',
      success: function(template) {
        callback(template);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        callback({
          xhr: xhr,
          ajaxOptions: ajaxOptions,
          thrownError: thrownError
        });
      }
    });
  }

  return me

})(jQuery, BGT.util || {});

$('#init').bind('click', function () {
  BGT.util.getTemplate({
    "templateUrl": '/wordpress-mustache-test/views/frame/frame.html'
  }, function (template) {
    console.log(Mustache.render(template));
  });
})