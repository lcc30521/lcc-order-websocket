<template>
   <div>1111</div>
</template>

<script>
    export default {
    created() {
      this.lcc()
    },
     props:{
          user:Object
        
        },
   
    methods:{
       lcc(){
                 window.Echo.private(`User.${this.user.id}`)
                 .listen('OrderStatus',(e)=>{
                   console.log(e);
                   this.buldmessage(e)
                 })
       },
       buldmessage(e){
           this.$notify({
            title: '订单状态更新',
            message: `${e.cnstatus}(请点击查看)`,
            type: 'success',
            duration:0,
            onClick:()=>{
              window.location.href=`/users/${this.user.id}/orders`
            }
          });
       }
      


    }
    
  
       
    }
</script>
