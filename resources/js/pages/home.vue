<template>
    <div>
        <h3 class="text-center">All Cars</h3><br/>

        <table class="table table-bordered table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <!-- <th>User_ID</th> -->
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
                <!-- <td>{{ car.user_id }}</td> -->
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
    // import Cookies from 'js-cookie';
    export default {
      middleware: 'auth',

      data() {
        // console.log(Cookies.get('token'));
        return {
            cars: []
        }
      },
      created() {
        const url = 'http://localhost:8000/api/cars?';
        const options = { method: 'POST' };
        const token = { token: this.$store.getters['auth/token'] };
        const params = new URLSearchParams(token);

        // raw fetch request
        fetch(url + params, options)
          .then(response => response.json())
          .then(data => this.cars = data)
          .catch(error => console.log(error));
      },
      methods: {
        deleteCar(id) {
          const url = `http://localhost:8000/api/car/delete/${id}?`;
          const options = { method: 'DELETE' };
          const token = { token: this.$store.getters['auth/token'] };
          const params = new URLSearchParams(token);

          // raw fetch request
          fetch(url + params, options)
            .then(response => {
              let i = this.cars.map(item => item.id).indexOf(id); // find index of your object
              this.cars.splice(i, 1)
            })
            .catch(error => console.log(error));
        }
      }
    }
</script>