<template>
    <div>
        <md-button @click="onClicked()" class="md-fab">
            <md-icon v-bind:style="{color: 'white'}">add</md-icon>
        </md-button>
    </div>
</template>

<script >
export default {
    
    name: "VehicleView",
    props: {
        properties: Array
    },
    activated: function() {
        console.log(this.properties[0].model)
    },
    methods: {
        onClicked() {
            this.$emit('eventname', ["AllVehicles", this.properties[0], this.properties[1]])
        }
    }
}
</script>