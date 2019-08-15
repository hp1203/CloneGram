<template>
  <div>
    <button
      class="btn btn-primary ml-4"
      style="
        padding: 3px 10px;
        font-size: 12px;
      "
      @click="followUser" 
      v-text="buttonText"
      ></button>
  </div>
</template>

<script>
export default {
    props: ['userId','follows'],

    mounted() {
        console.log("Component mounted.");
    },

    data: function () {
        return {
            status: this.follows
        }
    },
    
    methods: {
        followUser() {
            axios.post('/follow/'+ this.userId)
            .then(res => {
                this.status = !this.status
                console.log(res.data);
            })
            .catch(error => {
                if(error.response.status == 401){
                    window.location = '/login';
                }
            })
        }
    },

    computed: {
        buttonText() {
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
};
</script>
