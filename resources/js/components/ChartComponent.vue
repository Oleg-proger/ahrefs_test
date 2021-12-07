<!--<template>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-8">-->
<!--                <bar-chart :chartdata="data" :height="100" :options="{resposive:true,maintainAspectRation:true}"></bar-chart>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--// import BarChart from './BarChart.js'-->
<!--//-->
<!--// export default {-->
<!--//     components: {-->
<!--//         BarChart,-->
<!--//     },-->
<!--//     data: function () {-->
<!--//         return {-->
<!--//             data: [],-->
<!--//         }-->
<!--//     },-->
<!--//     mounted () {-->
<!--//         this.update()-->
<!--//     },-->
<!--//     methods: {-->
<!--//         update: function () {-->
<!--//             axios.get('/charts').then((response) => {-->
<!--//                 this.data = response.data-->
<!--//             });-->
<!--//         }-->
<!--//     }-->
<!--// }-->
<!--import BarChart from './BarChart'-->

<!--export default {-->
<!--    mounted () {-->
<!--        this.renderChart(this.data, this.options)-->
<!--    }-->
<!--    // chartdata: {-->
<!--    //     labels: ['January', 'February'],-->
<!--    //     datasets: [-->
<!--    //         {-->
<!--    //             label: 'Data One',-->
<!--    //             backgroundColor: '#f87979',-->
<!--    //             data: [40, 30]-->
<!--    //         },-->
<!--    //         {-->
<!--    //             label: 'Data Two',-->
<!--    //             backgroundColor: '#f09',-->
<!--    //             data: [25, 20]-->
<!--    //         },-->
<!--    //         {-->
<!--    //             label: 'Data Three',-->
<!--    //             backgroundColor: '#f43',-->
<!--    //             data: [15, 10]-->
<!--    //         },-->
<!--    //     ]-->
<!--    // },-->
<!--    // options: {-->
<!--    //     responsive: true,-->
<!--    //     maintainAspectRatio: false-->
<!--    // }-->

<!--}-->
<!--</script>-->


<template>
    <div class="small">
        <h4>График</h4>
        <bar-chart :chart-data="datacollection" :height="300" :options="{resposive:true,maintainAspectRation:true}"></bar-chart>
    </div>
</template>

<script>

import BarChart from './BarChart'

export default {
    components: {
        BarChart
    },
    props: ['id'],
    data: function () {
        return {
            datacollection: null
        }
    },
    mounted () {
        axios.post('/start/charts', {id: this.id}).then((response) => {

            this.datacollection = response.data
        });

    }
}

</script>

<style lang="css">
.small {
    max-width: 800px;
    /* max-height: 500px; */
    margin:  50px auto;
}
</style>
