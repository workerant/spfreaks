jQuery(document).ready(function($) {

  $.fn.exists = function(callback) {
    var args = [].slice.call(arguments, 1);
    if (this.length) {
      callback.call(this, args);
    }
    return this;
  };


  $('#filters').exists(function(){
    var $checkboxes = $(this).find("input:checkbox"),
        currentPath = window.location.pathname.split('/');

    $checkboxes.prop('checked', false);

    if(currentPath[2]) {
      var paths = currentPath[2].split(',');
      for (var i = 0; i < paths.length; i++) {
        if(paths[i]) $("input#" + paths[i]).prop('checked', true);
      }
    }

    $('#sortby').on('change', function(e) {
      window.location.search = $(this).val();
    });

    $checkboxes.on('change', function(e) {

      var type      = $(this).attr('name'),
          value     = $(this).val(),
          isChecked = $(this).prop('checked'),
          resetURL  = '/item',
          newURL    = '/' + type + '/';

      if(isChecked) {
        if(type === currentPath[1]) {
          newURL += currentPath[2] + ',' + value;
        } else {
          newURL += value;
        }
      } else {
        newPath = currentPath[2].replace(value,'').replace(/,+/g,",").replace(/(^,)|(,$)/g, "");
        if(newPath !== '') {
          newURL += newPath;
        } else {
          newURL = resetURL;
        }
      }
      window.location = newURL + '/';

    });

  });

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'twitter-jssdk'));

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  

});