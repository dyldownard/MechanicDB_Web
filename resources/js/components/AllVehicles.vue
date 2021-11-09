<template>
    <div>
        <h2 class="text-center">Vehicles List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Mileage</th>
                <th>VIN</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="vehicle in vehicles" :key="vehicle.vid">
                <td>{{ vehicle.vid }}</td>
                <td>{{ vehicle.make }}</td>
                <td>{{ vehicle.model }}</td>
                <td>{{ vehicle.year }}</td>
                <td>{{ vehicle.mileage }}</td>
                <td>{{ vehicle.VIN }}</td>
                <td>
                    <div class="btn-group" role="group">
                        {/*<router-link :to="{name: 'edit', params: { id: vehicle.vid }}" class="btn btn-success">Edit</router-link>*/}
                        <button class="btn btn-danger" @click="deleteVehicle(vehicle.vid)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>


export default {
    data() {
        return {
            vehicles: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/vehicles/')
            .then(response => {
                this.vehicles = response.data;
            });
    },
    methods: {
        deleteVehicle(vid) {
            this.axios
                .delete(`http://localhost:8000/api/vehicles/${vid}`)
                .then(response => {
                    let i = this.vehicles.map(data => data.vid).indexOf(vid);
                    this.vehicles.splice(i, 1)
                });
        }
    }
}