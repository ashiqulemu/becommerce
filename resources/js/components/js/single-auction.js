import {Auction} from "../../auctionClass";

export default {
    data() {
        return {
            auctions: [],
            serverTime: window.serverTime,
            currentPath: window.currentPath,
            renderComponent: true,
            onBidServerTime: '',
            autoBids: [],
        }
    },
    created() {
        this.getData()
        Echo.channel('bidChannel')
            .listen('.BidUpdate', async (e) => {
                await this.clearRuningTimeOut()
                await this.clearRuningTimeOut()
                await this.clearRuningTimeOut()
                await this.clearRuningTimeOut()
                // this.forceRerender()
                $('#timer' + e.message).html('00:00:00');
                $('#timer' + e.message).css("background-color", "#ffa500")

                this.getData()
                setTimeout(function () {
                    $('#timer' + e.message).css("background-color", "")
                }, 300)


            });
    },
    computed: {

    },
    methods: {
        getData() {
            var urls = window.currentPath.split('/')
            axios.get('/auction-single-data/' + urls[2]).then(res => {
                this.auctions = res.data.auctions
                this.onBidServerTime = res.data.serverTime
                this.autoBids = res.data.autoBidByUser
            })
        },
        async auctionTimeSlot(auction) {

            await this.clearRuningTimeOut()
            $('#timer' + auction.id).css("background-color", "")
            $('#timer' + auction.id).html('00:00:00');
            var serTime = this.onBidServerTime ? this.onBidServerTime : this.serverTime
            if (this.moment(auction.up_time).format('YYYY-MM-DD HH:mm:ss') <=
                this.moment(serTime).format('YYYY-MM-DD HH:mm:ss')) {
                var newAuction = new Auction(auction, serTime);
                if (auction.bids.length < 2) {
                    newAuction.setTimerWithServerTime()
                } else {
                    newAuction.setTimerWithBid(auction.bids)
                }
                this.$nextTick(() => {
                    $('#timer' + auction.id).html(newAuction.currentDiffTime ?
                        newAuction.currentDiffTime : '00:00:00');
                    newAuction.startTimer();
                })

            }

        },
        bidNow(id, costPerBid, is_auto = false) {

            if ($('#timer' + id).html() == '00:00:01') {
                return false;
            }

            var currentBalance = this.$root._data.user.credit_balance - costPerBid
            if (currentBalance >= 0) {
                axios.post('/bid', {
                    auction_id: id,
                    cost_bid: costPerBid,
                    auto: is_auto
                }).then(res => {

                })
            } else {
                alert("You don't have enough credit Please buy first. Please top up.")
            }


        },

        forceRerender() {
            this.renderComponent = false;
            this.$nextTick(() => {
                this.renderComponent = true;
            });
        },
        clearRuningTimeOut() {
            var ids = window.allAuctionSetTimout
            ids.forEach(data => {
                window.clearTimeout(data);
                var index = window.allAuctionSetTimout.indexOf(data);
                if (index !== -1) window.allAuctionSetTimout.splice(index, 1);
            })
        },
        getItem() {
            return _.orderBy(this.auctions.bids, ['id'], ['desc'])
        },
        getPrice(auction) {
            return parseFloat(parseFloat(auction.starting_price) +
                (parseFloat(auction.price_increase_every_bid) * auction.bids.length)).toFixed(2)
        },
        getPriceDrop(item) {
            if (item) {
                if (this.$root._data.user.hasOwnProperty('id')) {
                    var userBids = item.bids.filter(data => data.user_id == this.$root._data.user.id)
                    if (item.product) {
                        var totalExpnes = userBids.length == 0 ? 0 :
                            userBids.length * (parseFloat(item.cost_per_bid) * 10)
                        return parseFloat(item.product.price - ((parseFloat(totalExpnes) *
                            item.price_drop_percentage) / 100)).toFixed(2)
                    }
                } else {
                    return item.product.price
                }


            }
        }

    }

}