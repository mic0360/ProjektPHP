console.log(vyhledanaData)

var pocetM = 0
var pocetZ = 0

var bmiM = 0
var bmiZ = 0


if (vyhledanaData == null) {

} else {

for (i=0; i< vyhledanaData.length; i++) {

   if (vyhledanaData[i]['pohlavi'] == 'muž') {

       var bmi = vyhledanaData[i]['vaha']/Math.pow(vyhledanaData[i]['vyska'],2)
       bmiM += Number(bmi)
       pocetM += 1 
   } else {
       var bmi = vyhledanaData[i]['vaha']/Math.pow(vyhledanaData[i]['vyska'],2)
       bmiZ += Number(bmi)
       pocetZ += 1 
   }

}

var avgBmiM = Math.round(bmiM/pocetM,2)
var avgBmiZ = Math.round(bmiZ/pocetZ,2)

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
   type: 'bar',
   data: {
       labels: ['Muži', 'Ženy'],
       datasets: [{
           label: 'BMI',
           data: [avgBmiM, avgBmiZ],
           backgroundColor: [
               'rgba(54, 162, 235, 0.2)',
               'rgba(255, 99, 132, 0.2)'
           ],
           borderColor: [
               'rgba(54, 162, 235, 1)',
               'rgba(255, 99, 132, 1)'
           ],
           borderWidth: 1
       }]
   },
   options: {
       scales: {
           yAxes: [{
               ticks: {
                   beginAtZero: true
               }
           }]
       }
   }
});

}