 $(document).ready(function() {

//     //#region 
//     $(document).on("click", "#logoutBtn", function (event) {
//         $.ajax({
//             url:window.site_url.concat("user/logout"),
//             method: "POST",
//             success: function(res) {
                
//             }
//         })
        
//     })
//     //#endregion 
    $(document).on("click", "#saveBtn", function(){
        Swal.fire({
            title: "Do you want to save it?",
            icon: "warning",
            title: "error!",
            showCancelButton:true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel:true,
        })
    });

    //#region BAR CHART / BAR GRAPH
    var ctx = document.getElementById("sampleChart1").getContext('2d');
    var sampleChart1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels : ["C.Ariano","K.Pampid","M.Falcutila","R.Gonito"],
            datasets: [{
                label: "Reaserch & Development",
                data: [50, 80 , 60, 90],
                backgroundColor: ["red","blue","green","yellow"]
            }]
        },
        options:{
            plugins: {
                label:false
            },
            scales:{
                xAxes:[{
                    barPercentage: 0.6,
                    display:true
                }],
                yAxes:[{
                    display:true,
                    ticks:{
                        stepsSize: 10,
                        min: 0,
                        max: 100
                    },
                    scaleLabel:{
                        display:true,
                        labelString: "Percentage %"
                    }
                }]
            }
        }
    });
    //LINE GRAPH
    var ctx = document.getElementById("sampleChart2").getContext("2d");
    var sampleChart2 = new Chart(ctx,{
        type: "line",
        data:{
            labels: ["Monday","Tuesday","Wednesday","Thursday","Friday"],
            datasets: [{
                label: "Activity Score",
                data: [50, 50 , 70, 90, 80],
                borderColor: ["red"],
            },{
                label: "Exam Score",
                data: [24,64,53, 26, 64],
                borderColor: ["green"],
            }],
        },
        options:{
            plugins:{
                label:false,
                datalabels:false
            },
        }
    
    })
    //PIE GRAPH
    var ctx = document.getElementById("sampleChart3").getContext("2d");
    var sampleChart3 = new Chart (ctx, {
         type: "pie",
         data:{
             labels: ["Apple","Banana","Pineapple","Grapes","Mango"],
             datasets: [{
                 label: "Hello World",
                data: [10, 40 , 20 , 30, 10],
                backgroundColor: ['red','yellow','orange','green','blue'],
             }],
             
         }
    })
    // DOUGHNOT GRAPH
    var ctx = document.getElementById("sampleChart4").getContext("2d");
    var sampleChart3 = new Chart (ctx, {
         type: "doughnut",
         data:{
             labels: ["Apple","Banana","Pineapple","Grapes","Mango"],
             datasets: [{
                 label: "Hello World",
                data: [40, 10 , 30 , 5, 20],
                backgroundColor: ['red','yellow','orange','green','cyan'],
             }],
             
         }
    })

    //LIVE GRAPH OR STREAM DATA 
    var ctx = document.getElementById("sampleChart5").getContext("2d");
    var sampleChart3 = new Chart (ctx, {
        type: "line",
        data: {
            dataset:[{
                data:[]
            }, {
                data:[]
            
            }]
        },
        options: {
            scales: {
                x: {
                    type: "realtime"
                }
            }
        }
    })
});
