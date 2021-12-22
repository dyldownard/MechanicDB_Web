<template>
    <div>
        <md-button @click="onBackClicked()" v-bind:style="{position: 'fixed'}" class="md-icon-button">
            <md-icon >arrow_back</md-icon>
        </md-button>
        <h2 class="text-center">{{vehicle.year}} {{vehicle.make}} {{vehicle.model}}'s Tasks</h2>

        </br>
        </br>

        <div v-bind:style="{}">
            <div v-bind:style="{minWidth: '250px', width: 'fit-content', padding: '5px', borderRadius: '5px'}" v-for="task in tasks" :key="task.tid">
                <md-card v-bind:style="{borderRadius: '5px'}" md-with-hover>
                    <md-card-header v-bind:style="{backgroundColor: '#448aff', borderRadius: '5px'}">
                        <div v-bind:style="{color: 'white'}" class="md-title">{{task.datecomp}} | {{task.name}}</div>
                    </md-card-header>
                    <md-card-content v-bind:style="{padding:'5px'}">
                        <ul v-bind:style="{marginTop: '14px'}">

                        </ul>
                    </md-card-content>
                </md-card>
            </div>
        </div>

        <md-button md-primary @click="showDialog = true" class="md-fab md-fab-bottom-right">
            <md-icon v-bind:style="{color: 'white'}">add</md-icon>
        </md-button>
    </div>
</template>

<script >
export default {

    name: "VehicleView",
    data: function() {
        return ({
            showDialog: false,
            vehicle: {},
            tasks: []
        })
    },
    props: {
        properties: Array
    },
    activated: function() {
        if (this.vehicle === this.properties[0]) {
            return
        }else {
            this.tasks = []
        }
        console.log(this.properties[0].vid)
        this.vehicle = this.properties[0]
        this.axios
            .get('http://localhost:8000/api/tasks/' + this.properties[0].vid)
            .then(response => {
                this.tasks = response.data;
                console.log(response.data)
            }).catch(err => {console.log(err.response.data)
            console.log(err.response.status)
            console.log(err.response.headers)
            })

    },
    methods: {
        onBackClicked() {
            this.$emit('eventname', ["AllVehicles", this.properties[0], this.properties[1]])
        }
    }
}
</script>
