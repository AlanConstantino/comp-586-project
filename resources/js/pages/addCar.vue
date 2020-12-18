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
    import axios from 'axios';

    export default {
        middleware: 'auth',
        data() {
            return {
                car: {}
            }
        },
        methods: {
            async addCar() {
                const { data } = await axios.post('/api/car/add', this.car);
                this.$router.push({name: 'home'});
            }
        }
    }
</script>