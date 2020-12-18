<template>
    <div>
        <h3 class="text-center">All Cars</h3><br/>

        <table class="table table-bordered table-hover table-responsive">
            <thead>
            <tr>
                <th>Car ID</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>Year</th>
                <th>Make</th>
                <th>Type</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="car in cars" :key="car.id">
                <td>{{ car.id }}</td>
                <td>{{ car.uid }}</td>
                <td>{{ car.name }}</td>
                <td>{{ car.year }}</td>
                <td>{{ car.make }}</td>
                <td>{{ car.type }}</td>
                <td>{{ car.created_at }}</td>
                <td>{{ car.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: car.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteCar(car.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
      middleware: 'auth',
      data() {
        return {
            cars: [],
        }
      },
      async created() {
        const { data } = await axios.get('api/cars');
        this.cars = data;
      },
      methods: {
        async deleteCar(id) {
          const { data } = await axios.delete(`/api/car/delete/${id}`);
          let i = this.cars.map(item => item.id).indexOf(id); // find index of your object
          this.cars.splice(i, 1);
        }
      }
    }
</script>