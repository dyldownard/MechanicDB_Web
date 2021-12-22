<template>
    <div class="container">
        <h1 v-bind:style="{marginTop:'30px'}" class="text-center"> MechanicDB </h1>
        <keep-alive>
            <component :properties.sync="properties" @eventname="updateparent" :is="dynamicComponent"></component>
        </keep-alive>
    </div>

</template>

import Vue from 'vue';
Vue.component('AllVehicles', require('./components/AllVehicles.vue').default);
Vue.component('VehicleView', require('./components/VehicleView.vue').default);

<script>
export default {
    data() {
        return {
            dynamicComponent: 'AllVehicles',
            properties: []
        }
    },
    methods: {
        updateparent(variable) {
            this.properties[0] = variable[1]
            this.properties[1] = variable[2]
            this.dynamicComponent = variable[0]
        }
    }
}
</script>
