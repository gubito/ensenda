
  jQuery(document).ready(function($) {

      $.get('gj_parcel_counts.txt', function(data) {
        var parcel_file = data.split('\n');
        var yesterday   = parcel_file[0];
        var alltime     = parcel_file[1];

        $.fn.digits = function(){ 
          return this.each(function(){ 
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
          })
        }
        
        $('#yesterday').append(yesterday).digits();
        $('#alltime').append(alltime).digits();
        
      });

  });

