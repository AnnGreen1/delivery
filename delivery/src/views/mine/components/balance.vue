<template>
  <van-nav-bar class="nav-bar" left-arrow @click-left="$router.back()">
  </van-nav-bar>
  <div ref="container" class="container">
    <div class="content-top" ref="top"></div>
    <div class="content-bottom" ref="bottom"></div>
  </div>
</template>

<script>
import globalConfig from "../../../globalConfig.vue";
import * as echarts from "echarts";
export default {
  data() {
    return {
      toplist: [],
      topX: [],
      topseries: [],
      bottomlist: [],
    };
  },
  created() {
    this.itemlist();
  },
  mounted() {
    // this.viewtop();
  },
  methods: {
    itemlist() {
      this.$axios({
        methos: "get",
        url:
          globalConfig.base_url +
          `/deliveryServer/view.php?username=${sessionStorage.getItem(
            "username"
          )}`,
      })
        .then((res) => {
          //将订单列表中完成的提取出来
          this.toplist = res.data.filter((item) => item.o_state == "已完成");
          this.topX = this.toplist.map((item) => {
            return item.o_title;
          });
          this.topseries = this.toplist.map((item) => {
            return item.o_total / 100;
          });
          this.viewtop();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    viewtop() {
      var myChart = echarts.init(this.$refs.top);
      // 绘制图表
      myChart.setOption({
        title: {
          text: "消费折线图",
        },
        xAxis: {
          data: this.topX,
          axisLabel: {
            show: true,
            textStyle: {
              color: "#47576A", //这里用参数代替了
            },
            interval: 0,
            // rotate: 30,//文字倾斜角度
            formatter: function (value) {
              // if (value.length > 5) {
              //   value = value.substring(0, 8) + "..";
              // }
              // return value;
              var ret = ""; //拼接加\n返回的类目项
              var maxLength = 3; //每项显示文字个数
              var valLength = value.length; //X轴类目项的文字个数
              var rowN = Math.ceil(valLength / maxLength); //类目项需要换行的行数
              if (rowN > 1) {
                //如果类目项的文字大于3,
                for (var i = 0; i < rowN; i++) {
                  var temp = ""; //每次截取的字符串
                  var start = i * maxLength; //开始截取的位置
                  var end = start + maxLength; //结束截取的位置
                  //这里也可以加一个是否是最后一行的判断，但是不加也没有影响，那就不加吧
                  temp = value.substring(start, end) + "\n";
                  ret += temp; //凭借最终的字符串
                }
                return ret;
              } else {
                return value;
              }
            },
          },
        },
        yAxis: {},
        series: [
          {
            data: this.topseries,
            type: "line",
            smooth: true,
          },
        ],
      });
    },
    viewbottom() {},
  },
};
</script>

<style lang="scss" scoped>
.container {
  height: 600;
  .content-top {
    height: 300px;
  }
}
</style>