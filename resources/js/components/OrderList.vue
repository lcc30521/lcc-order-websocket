<template>
<div v-if="orders.data.length">
    <div class="card mb-3" v-for="order in orders.data" :key="order.id">
      <div class="card-header d-flex flex-row justify-content-between">
         <span>订单号：{{order.orderNo}}</span>
         <span>订单金额：{{order.total}}</span>
         <span>订单用户：{{user.name}}</span>
      </div>
       <div class="card-body">
            <el-timeline >
          <el-timeline-item
            v-for="(st, index) in order.statuses"
            :key="index"
            :timestamp="st.created_at">
            {{lcc(st.name)}}
            <br>
            <small class="text-muted"> {{gsn(st.name)}}</small>
          </el-timeline-item>
        </el-timeline>
       </div>
    </div>
    </div>
</template>

<script>
    export default {
    data(){
    return {
        resa:{
          1:'卖家已经接单，请耐心等待',
          2:'卖家已经发货，正在等待运送',
          3:'骑手正在运送中',
          4:'已送达,订单完成'


        }

    }
    },
    created() {
      this.cc()
     
    },
     props:{
          orders:Object,
          user :Object,
          statuses :Object
        },
   
    methods:{
      cc(){
           window.Echo.private('Order3')
                 .listen('OrderStatus',(e)=>{
                   console.log(e);
                 })
      },
       lcc(key){
         return this.statuses[key]
       },
       gsn(key){
       return this.resa[key]
       }


    }
    
  
       
    }
</script>
