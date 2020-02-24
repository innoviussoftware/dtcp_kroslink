<script>


    function googleTranslateElementInit() {

      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');

  }



  function triggerHtmlEvent(element, eventName) {

      var event;

      if (document.createEvent) {

          event = document.createEvent('HTMLEvents');

          event.initEvent(eventName, true, true);

          element.dispatchEvent(event);

      } else {

          event = document.createEventObject();

          event.eventType = eventName;

          element.fireEvent('on' + event.eventType, event);

      }

  }



  // jQuery('.language-select').click(function() {

  //     var theLang = jQuery(this).attr('data-lang');

  //     jQuery('.goog-te-combo').val(theLang);

  //     window.location = jQuery(this).attr('href');

  //     location.reload();



  // });

</script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>