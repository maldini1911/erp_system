$(function() {
    "use strict";



// chart 2
$(document).ready(function(){




  //===> States Projects By Packeges 
  $.getJSON($('#url-chart-sales-packegs').val(), function(data) {
    var ctx = document.getElementById("dashboard3-chart-1").getContext('2d');

    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Mini Package", "Bussines Package", "Super Package", "CMS(wordpress,joomla,etc)", "Private"],
        datasets: [{
          backgroundColor: [
            '#5e72e4',
            '#ff2fa0',
            '#2dce89',
            '#fff',
            '#111',
          ],
          hoverBackgroundColor: [
            '#5e72e4',
            '#ff2fa0',
            '#2dce89',
            '#fff',
            '#111',
          ],
          data: [data.mini_package, data.bussines_package, data.super_package, data.cms, data.private],
    borderWidth: [1, 1, 1, 1, 1]
        }]
      },
      options: {
    cutoutPercentage: 25,
          legend: {
      position: 'right',
            display: true,
      labels: {
              boxWidth:12,
      fontColor: '#ddd'
            }
          },
    tooltips: {
      displayColors:false,
    }
      }
    });

});



  //===> States Projects By Categories
  $.getJSON($('#url-chart-sales-category').val(), function(data) {
      var ctx = document.getElementById("dashboard3-chart-2").getContext('2d');

      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ["Web Designing", "Marketing", "Graphics Design", "Other"],
          datasets: [{
            backgroundColor: [
              '#5e72e4',
              '#ff2fa0',
              '#2dce89',
              '#fff'
            ],
            hoverBackgroundColor: [
              '#5e72e4',
              '#ff2fa0',
              '#2dce89',
              '#fff'
            ],
            data: [data.web_design, data.marketing, data.graphic_design, data.other],
      borderWidth: [1, 1, 1, 1]
          }]
        },
        options: {
      cutoutPercentage: 25,
            legend: {
        position: 'right',
              display: true,
        labels: {
                boxWidth:12,
        fontColor: '#ddd'
              }
            },
      tooltips: {
        displayColors:false,
      }
        }
      });

  });



/*
  $.getJSON(window.location.href, function(data) {
    alert('Yes');
  });
  */

});



 //donut

    $("span.donut").peity("donut",{
          width: 120,
          height: 120 
      });







   });	 
   