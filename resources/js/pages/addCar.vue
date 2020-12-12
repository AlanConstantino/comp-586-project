<template>
    <div>
        <h3 class="text-center">Add Car</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCar">
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
                    <button type="submit" class="btn btn-primary">Add Car</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        middleware: 'auth',
        data() {
            return {
                car: {}
            }
        },
        methods: {
            addCar() {
                const baseUrl = 'http://localhost:8000/api/car/add?';
                const token = this.$store.getters['auth/token'];
                const params = new URLSearchParams(this.car);
                const options = { method: 'POST' };
                const url = baseUrl.concat(params, '&token=', token);

                fetch(url, options)
                    .then(response => this.$router.push({name: 'home'}))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false);
            }
        }
    }
</script>