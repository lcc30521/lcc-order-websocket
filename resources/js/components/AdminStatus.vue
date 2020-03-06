<template>
<div> 


<el-steps :active="active" finish-status="success">
  <el-step v-for="st in statuses" :key='st' :title="st"></el-step>
  
</el-steps>

<button class="btn btn-success" @click="next" v-if="show">下一步</button>
</div>
</template>
<script>
  export default {
   props:{
          status:Number,
          statuses:Object,
          order:Number
        },
    data() {
      return {
        active: this.status
      };
    },
   computed:{
      show(){
         return this.active >= Object.keys(this.statuses).length?false:true
      }
   },
    methods: {
      next() {
       this.active ++
       if(this.active > Object.keys(this.statuses).length){
          return 
       }

       axios.post(`/orders/${this.order}`,{status:this.active}).then(()=>{
         location.reload()

       })
      }
    }
  }
</script>
