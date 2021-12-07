<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>Example</div>
                <bar-chart :chart-data="data" :height="100" :options="{responsive:true, maintainAspectRation:true}"></bar-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import BarChart from "./BarChart";
    export default {
        components: {
            BarChart
        },
        data: function () {
            return {
                data: [],
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/charts/{id}').then((response) => {
                    this.urldata = response.data
                });
            }
        }
    }
</script>
