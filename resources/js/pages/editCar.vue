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
    import axios from 'axios';

    export default {
        middleware: 'auth',
        data() {
            return {
                car: {}
            }
        },
        async created() {
            const { data } =  await axios.get(`/api/car/edit/${this.$route.params.id}`);
            this.car = data;
        },
        methods: {
            async updateCar() {
                const { data } = await axios.put(`/api/car/update/${this.$route.params.id}`, this.car);
                this.$router.push({name: 'home'});
            }
        }
    }
</script>