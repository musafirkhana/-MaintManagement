
//Custom JS

var baseUrl = 'http://127.0.0.1:8000/';
$(document).ready(function () {
   
        
      

      
      

       var getUrl = baseUrl+'getchart_data';
      
       $.ajax({
          type:'GET',
          url: getUrl, 
          success:function(data){
   
            var areaChartData = {
     
              labels  : data.months,
              datasets: [
                {
                  label               : '3011',
                  backgroundColor     : '#0077F7',
                  borderColor         : 'rgba(60,141,188,0.8)',
                  pointRadius          : false,
                  pointColor          : '#0077F7',
                  pointStrokeColor    : 'rgba(60,141,188,1)',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data                : data.flg_count_array
                },
                {
                  label               : '3014',
                  backgroundColor     : '#F7BB07',
                  borderColor         : 'rgba(210, 214, 222, 1)',
                  pointRadius         : false,
                  pointColor          : 'rgba(210, 214, 222, 1)',
                  pointStrokeColor    : '#F7BB07',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data                : data.monthly_flg_counr_array_3014
                },
                {
                  label               : '3015',
                  backgroundColor     : '#27A243',
                  borderColor         : 'rgba(210, 214, 222, 1)',
                  pointRadius         : false,
                  pointColor          : 'rgba(210, 214, 222, 1)',
                  pointStrokeColor    : '#27A243',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data                : data.monthly_flg_counr_array_3015
                },
              ]
            }
        
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, areaChartData)
           
           
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            var temp2 = areaChartData.datasets[2]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0
            barChartData.datasets[2] = temp2
        
            var barChartOptions = {
              responsive              : true,
              maintainAspectRatio     : false,
              datasetFill             : false
            }
        
            var barChart = new Chart(barChartCanvas, {
              type: 'bar', 
              data: barChartData,
              options: barChartOptions
            })
     
        }
          
       });
   

   

    


//-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var getYearUrl = baseUrl+'getdonate_data';
    $.ajax({
      type:'GET',
      url: getYearUrl, 
      success:function(data){
        console.log(data);

    var donutData        = {
      labels: [
          '3011', 
          '3014',
          '3015', 
         
      ],
      datasets: [
        {
          data: data.year,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
        }
      ]
    }
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
     
    }
      
   });



  });

 


