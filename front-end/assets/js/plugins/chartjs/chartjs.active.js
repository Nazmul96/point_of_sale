// (function ($) {
//           var rafi='<?php echo json_encode($monthly_sales)?>';
//           var myarray=JSON.parse(rafi);
//           var janu=myarray[1].sub_total;
//           var feb=myarray[2].sub_total;
//           var march=myarray[3].sub_total;
//           var apr=myarray[4].sub_total;
//           var may=myarray[5].sub_total;
//           var june=myarray[6].sub_total;
//           var july=myarray[7].sub_total;
//           var auguest=myarray[8].sub_total;
//           var sep=myarray[9].sub_total;
//           var oct=myarray[10].sub_total;
//           var nov=myarray[11].sub_total;
//           var dec=myarray[12].sub_total;
//           if(janu == null){
//               janu=0;
//           }
//           if(feb == null){
//               feb=0;
//           }
//           if(march == null){
//               march=0;
//           }
//           if(apr == null){
//               apr=0;
//           }
//           if(may == null){
//               may=0;
//           }
//           if(june == null){
//               june=0;
//           }
//           if(july == null){
//               july=0;
//           }
//           if(auguest == null){
//               auguest=0;
//           }
//           if(sep == null){
//               sep=0;
//           }
//           if(oct == null){
//               sep=0;
//           }
//           if(nov == null){
//               sep=0;
//           }
//           if(dec == null){
//               dec=0;
//           }
//           // console.log(janu);
//           // console.log(feb);
//           // console.log(march);
//           // console.log(apr);
//           // console.log(may);
//           // console.log(june);
//           // console.log(july);
//           // console.log(auguest);
//           // console.log(sep);
//           // console.log(oct);
//           // console.log(nov);
//           // console.log(dec);
      
      
//           "use strict";
//           if( $('#chartjs-revenue-statistics-chart').length ) {
//               var RSC = document.getElementById('chartjs-revenue-statistics-chart').getContext('2d');
//               var RSCconfig = {
//                   type: 'line',
//                   data: {
//                       labels: ['Jan', 'Feb', 'Mar','Apr', 'May','Jun', 'Jul','Aug', 'Sep','Oct', 'Nov', 'Dec'],
//                       datasets: [{
//                           label: 'Total Sale',
//                           data: [janu,feb,march,apr,may,june,july,auguest,sep,oct,nov,dec],
//                           backgroundColor: '#fb7da4',
//                           borderColor: '#fb7da4',
//                           borderWidth: 3,
//                           pointBackgroundColor: '#ffffff',
//                           pointBorderColor: '#fb7da4',
//                           pointBorderWidth: 3,
//                           pointRadius: 6,
//                           pointHoverBackgroundColor: '#ffffff',
//                           pointHoverBorderWidth: 3,
//                           pointHoverRadius: 6,
//                           fill: false,
//                           lineTension: 0
//                       } ]
//                   },
//                   options: {
//                       maintainAspectRatio: false,
//                       legend: {
//                           display: false,
//                           labels: {
//                               fontColor: '#aaaaaa',
//                           }
//                       },
//                       tooltips: {
//                           mode: 'point',
//                           intersect: false,
//                           xPadding: 10,
//                           yPadding: 10,
//                           caretPadding: 10,
//                           cornerRadius: 4,
//                           titleFontSize: 0,
//                           titleMarginBottom: 2,
//                           displayColors: false,
//                       },
//                       hover: {
//                           mode: 'nearest',
//                           intersect: true
//                       },
//                       scales: {
//                           xAxes: [{
//                               display: true,
//                               gridLines: {
//                                   display: false
//                               },
//                               ticks: {
//                                   fontColor: '#aaaaaa',
//                               },
//                           }],
//                           yAxes: [{
//                               display: false,
//                               gridLines: {
//                                   color: 'rgba(136,136,136,0.1)',
//                                   lineWidth: 1,
//                                   drawBorder: false,
//                                   zeroLineWidth: 1,
//                                   zeroLineColor: 'rgba(136,136,136,0.1)',
//                               },
//                               ticks: {
//                                   padding: 15,
//                                   stepSize: 20,
//                                   fontColor: '#aaaaaa',
//                               },
//                           }]
//                       }
//                   }
//               };
//               var RSCchartjs = new Chart(RSC, RSCconfig);
//           }
          
         
          
//           if( $('#chartjs-market-trends-chart').length ) {
//               var received=$('#received_amount').val();
//               var due=$('#due_amount').val();
//               var pending=$('#all_pending').val();
//               var paid=$('#all_paid').val();  
//               //alert(paid); 
//               var MTC = document.getElementById('chartjs-market-trends-chart').getContext('2d');
//               var MTCconfig = {
//                   type: 'doughnut',
//                   data: {
//                       labels: ['Received amount', 'Due amount',  'Paid amount','Pending amount' ],
//                       datasets: [{
//                           data: [received, due,paid,pending,],
//                           backgroundColor: [
//                               '#fb7da4',
//                               '#7dfb9b',
//                               '#ff9666',
//                               '#428bfa',
//                           ],
//                       }]
//                   },
//                   options: {
//                       maintainAspectRatio: false,
//                       legend: {
//                           labels: {
//                               boxWidth: 30,
//                               padding: 20,
//                               fontColor: '#aaaaaa',
//                           }
//                       },
//                       tooltips: {
//                           mode: 'point',
//                           intersect: false,
//                           xPadding: 10,
//                           yPadding: 10,
//                           caretPadding: 10,
//                           cornerRadius: 4,
//                           titleFontSize: 0,
//                           titleMarginBottom: 2,
//                       },
//                                               animation: {
//                                                         animateScale: true,
//                                                         animateRotate: true
//                                               },
//                   }
//               };
//               var MTCchartjs = new Chart(MTC, MTCconfig);
//           }
          
          
//       })(jQuery);