<template>
  <van-tabbar v-model="active" active-color="#00682f" route>
    <van-tabbar-item :to="tabConfig[0].path">
      <!-- 标签页文本内容 -->
      <span>{{ tabConfig[0].title }}</span>
      <!-- 定义标签页图标 -->
      <template #icon="props">
        <img
          :src="
            props.active
              ? iconSrc[tabConfig[0].icon_active]
              : iconSrc[tabConfig[0].icon]
          "
        />
      </template>
    </van-tabbar-item>
    <van-tabbar-item
      :to="tabConfig[1].path"
      @click="movepath()"
      @dblclick="$emit('select')"
    >
      <!-- 标签页文本内容 -->
      <span>{{ tabConfig[1].title }}</span>
      <!-- 定义标签页图标 -->
      <template #icon="props">
        <img
          :src="
            props.active
              ? iconSrc[tabConfig[1].icon_active]
              : iconSrc[tabConfig[1].icon]
          "
        />
      </template>
    </van-tabbar-item>
    <van-tabbar-item :to="tabConfig[2].path">
      <!-- 标签页文本内容 -->
      <span>{{ tabConfig[2].title }}</span>
      <!-- 定义标签页图标 -->
      <template #icon="props">
        <img
          :src="
            props.active
              ? iconSrc[tabConfig[2].icon_active]
              : iconSrc[tabConfig[2].icon]
          "
        />
      </template>
    </van-tabbar-item>
    <van-tabbar-item :to="tabConfig[3].path">
      <!-- 标签页文本内容 -->
      <span>{{ tabConfig[3].title }}</span>
      <!-- 定义标签页图标 -->
      <template #icon="props">
        <img
          :src="
            props.active
              ? iconSrc[tabConfig[3].icon_active]
              : iconSrc[tabConfig[3].icon]
          "
        />
      </template>
    </van-tabbar-item>
  </van-tabbar>
</template>

<script>
export default {
  name: "TabBar",
  data() {
    return {
      active: 0,
      // 每个标签的配置
      tabConfig: [
        {
          icon: "home",
          icon_active: "home_active",
          title: "首页",
          path: "/home",
        },
        {
          icon: "order",
          icon_active: "order_active",
          title: "点单",
          path: "/order?name=美食",
        },
        {
          icon: "cart",
          icon_active: "cart_active",
          title: "订单",
          path: "/cart",
        },
        {
          icon: "mine",
          icon_active: "mine_active",
          title: "我的",
          path: "/mine",
        },
      ],
      // 图片对应的路径
      iconSrc: {
        home: require("../assets/imgs/tabbar/home.png"),
        home_active: require("../assets/imgs/tabbar/home_active.png"),
        cart: require("../assets/imgs/tabbar/cart.png"),
        cart_active: require("../assets/imgs/tabbar/cart_active.png"),
        order: require("../assets/imgs/tabbar/order.png"),
        order_active: require("../assets/imgs/tabbar/order_active.png"),
        mine: require("../assets/imgs/tabbar/mine.png"),
        mine_active: require("../assets/imgs/tabbar/mine_active.png"),
      },
    };
  },
  methods: {
    movepath() {
      this.$router.push({ name: "order", query: { name: "美食" } });
    },
  },
};
</script>

<style lang="scss" scoped></style>