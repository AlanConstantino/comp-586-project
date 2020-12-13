<template>
    <div>
        <h3 class="text-center">Edit Car</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCar">
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" v-model="car.year">
                    </div>
                    <div class="form-group">
                        <label>Make</label>
                        <input type="text" class="form-control" v-model="car.make">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" v-model="car.type">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Car</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        middleware: 'check-auth',
        data() {
            return {
                car: {}
            }
        },
        created() {
            const url = `https://alan-laravel-spa.herokuapp.com/api/car/edit/${this.$route.params.id}?token=`;
            const token = this.$store.getters['auth/token'];
            const params = new URLSearchParams(token);
            const options = { method: 'GET' };

            fetch(url + params, options)
                .then(response => response.json())
                .then(data => this.car = data)
                .catch(error => console.log(error));
        },
        methods: {
            updateCar() {
                const baseUrl = `https://alan-laravel-spa.herokuapp.com/api/car/update/${this.$route.params.id}?`;
                const token = this.$store.getters['auth/token'];
                const params = new URLSearchParams(this.car);
                const options = { method: 'PUT' };
                const url = baseUrl.concat(params, '&token=', token);

                fetch(url, options)
                    .then(response => this.$router.push({name: 'home'}))
                    .catch(error => console.log(error));
                }
        }
    }
</script>