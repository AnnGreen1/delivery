<template>
  <van-tabs v-model:active="active" @click-tab="typechange">
    <van-tab v-for="(type, index) in types" :title="type" :key="index">
      <van-card
        v-for="(item, index) in list"
        :key="index"
        :desc="信息"
        :title="item.s_name"
        :thumb="'/static/imgs/shop/' + item.s_icon"
        @click="
          $router.push({
            name: 'Meal',
            query: { id: item.s_id, shopname: item.s_name },
          })
        "
      >
        <template #tags>
          <van-tag plain type="danger">标签</van-tag>
          <van-tag plain type="danger">标签</van-tag>
        </template>
      </van-card>
    </van-tab>
  </van-tabs>
  <tab-bar></tab-bar>
</template>

<script>
import globalConfig from '../../globalConfig.vue';
import TabBar from "../../components/TabBar.vue";
export default {
  data() {
    return {
      //过滤后的数据
      list: [],
      //从数据库获取的总数居
      lists: [],
      types: [
        "美食",
        "超市",
        "生鲜果蔬",
        "专送",
        "快餐简食",
        "晚餐优选",
        "甜点饮品",
        "家常菜",
        "小吃馆",
        "鲜花蛋糕",
      ],
    };
  },
  methods: {
    typechange(p) {
      // this.list = this.lists.filter((item) => item.s_type == type);
      this.$route.query.name = p.title;
      this.mountlist();
    },
    mountlist() {
      let p = this.$route.query.name;
      this.list = this.lists.filter((item) => item.s_type == p);
      console.log(this.list);
    },
  },
  components: {
    "tab-bar": TabBar,
  },
  watch: {
    $route: "mountlist", //路由参数改变时触发
  },
  created() {
    this.$axios({
      methods: "get",
      url: globalConfig.base_url+`/deliveryServer/home.php?`,
    })
      .then((res) => {
        this.lists = res.data;
        this.mountlist();
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style lang="scss" scoped>
:deep .van-tabs__wrap {
  z-index: 100;
  position: fixed;
  top: 0px;
}
:deep .van-tabs__content {
  margin-top: 50px;
  margin-bottom: 40px;
}
.content-li {
  display: flex;
  justify-items: center;
  height: 105px;
  .content-p {
    margin: 10px;
    float: right;
  }
  .content-img {
    margin: 10px;
  }
}
</style>