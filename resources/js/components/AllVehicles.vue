<template>
    <div>
        <md-dialog v-bind:style="{minWidth: '500px'}" v-bind:md-backdrop=false :md-active.sync="showDialog">
        <md-dialog-title>Add Vehicle</md-dialog-title>

            <md-field v-bind:style="{margin:'10px'}">
                <label>Make</label>
                <md-input v-model="makeText"></md-input>
            </md-field>
            <md-field v-bind:style="{margin:'10px'}">
                <label>Model</label>
                <md-input v-model="modelText"></md-input>
            </md-field>
            <md-field v-bind:style="{margin:'10px'}">
                <label>Year</label>
                <md-input v-model="yearText"></md-input>
            </md-field>
            <md-field v-bind:style="{margin:'10px'}">
                <label>Odometer (Optional)</label>
                <md-input v-model="odoText"></md-input>
            </md-field>
            <md-field v-bind:style="{margin:'10px'}">
                <label>VIN (Optional)</label>
                <md-input v-model="vinText"></md-input>
            </md-field>

            <md-dialog-actions>
                <md-button class="md-primary" @click="showDialog = false">Cancel</md-button>
                <md-button class="md-primary" @click="onAdd()">Add</md-button>
            </md-dialog-actions>
        </md-dialog>

        <h1 class="text-center">MechanicDB</h1>
        <h2 class="text-center">Vehicles List</h2>
        </br>
        </br>
        <div v-bind:style="{display: 'flex', flexWrap: 'wrap'}">
            <div @click="onVehicleClicked(vehicle)" v-bind:style="{minWidth: '250px', width: 'fit-content', padding: '5px', borderRadius: '5px'}" v-for="vehicle in vehicles" :key="vehicle.vid">
                <md-card v-bind:style="{borderRadius: '5px'}" md-with-hover>
                    <md-card-header v-bind:style="{backgroundColor: '#448aff', borderRadius: '5px'}">
                        <div v-bind:style="{color: 'white'}" class="md-title">{{vehicle.year}} {{vehicle.make}} {{vehicle.model}}</div>
                    </md-card-header>
                    <md-card-content v-bind:style="{padding:'5px'}">
                        <ul v-bind:style="{marginTop: '14px'}">
                            <li>Odometer: {{vehicle.mileage}}</li>
                            <li>VIN: {{vehicle.VIN}}</li>
                        </ul>
                    </md-card-content>
                </md-card>
            </div>
        </div>
        <md-button @click="showDialog = true" class="md-fab md-fab-bottom-right">
            <md-icon v-bind:style="{color: 'white'}">add</md-icon>
        </md-button>
    </div>
</template>

<script >
export default {
    
    name: "AllVehicles",
    data() {
        return ({
            vehicles: [],
            showDialog: false,
            makeText: '',
            modelText: '',
            yearText: '',
            odoText: '',
            vinText: ''
        });
    },
    created: function() {
        this.axios
            .get('http://localhost:8000/api/vehicles/')
            .then(response => {
                this.vehicles = response.data;
            });
    },
    methods: {
        onAdd () {
          console.log(this.vehicles[0])
        if (this.makeText==="" || this.modelText==="" || this.yearText==="") {
            return
        }
        this.axios
            .post('http://localhost:8000/api/vehicles/', {
                make: this.makeText, model: this.modelText, year: this.yearText, mileage: this.odoText, type: 1, VIN: this.vinText
            })
        this.axios
            .get('http://localhost:8000/api/vehicles/')
            .then(response => {
                this.vehicles = response.data;
                this.showDialog = false
        });  
      },
      onVehicleClicked(vehicle) {
          this.$emit('eventname', ["VehicleView", vehicle, null])
      }
    }
}
</script>

