<template>
    <div class="col-lg-6">

        <div class="details">
            <div class="top-box">
                <div class="doller-closed">
                    <div style="display: none;">

                    </div>
                    <template v-if="auctions.bids ? auctions.bids.length : false">
                        {{ getPrice(auctions)}}
                    </template>
                    <template v-else>
                        {{parseFloat(auctions.starting_price).toFixed(2)}}
                    </template>
                    <br>
                    <span :id="'liveClose'+auctions.id" v-if="auctions.up_time <= $root.serverTime && !auctions.is_close">Live</span>
                    <span :id="'liveClose'+auctions.id" v-else-if="auctions.up_time > $root.serverTime && !auctions.is_close">Upcoming</span>
                    <span :id="'liveClose'+auctions.id" v-else-if="auctions.is_close">Closed</span>
                </div>
                <div class="middle-content">

                    <template v-if="auctions.slots?auctions.slots.length:false">
                        <div class="count" :id="'timer'+auctions.id" style="padding: 9px"></div>
                        <div :id="'bid'+auctions.id" v-show="false">false</div>
                        <!--<div  :id="''+item.id" v-show="false">{{item.id}}</div>-->
                        <div style="display: none;">
                            {{ auctionTimeSlot(auctions)}}
                        </div>
                    </template>
                </div>
                <div class="button-closed">
                    <template v-if="$root._data.user.hasOwnProperty('id')">
                        <button type="button" v-if="auctions.up_time <= $root.serverTime && !auctions.is_close">
                            <a href="#" @click.prevent="bidNow(auctions.id, auctions.cost_per_bid)"
                               :id="'putAuction'+auctions.id">
                                <img src="/images/home/hammer-bidding.png" alt="">
                            </a>

                        </button>
                    </template>
                    <template v-else>
                        <button type="button" v-if="auctions.up_time <= $root.serverTime && !auctions.is_close">
                            <a href="/#login-area" onclick="return confirm('you are not logged in please login first, NEW? then register first.')"
                               :id="'putAuction'+auctions.id">
                                <img src="/images/home/hammer-bidding.png" alt="">
                            </a>

                        </button>
                    </template>
                    <button type="button">
                        <template v-if="$root._data.user.hasOwnProperty('id')">
                            <a :href="'/auto-bid/create?id='+auctions.id">
                                <img src="/images/home/auto-bid.png" alt="">
                            </a>
                        </template>
                        <template v-else>
                            <a href="/#login-area"  onclick="return confirm('you are not logged in please login first, NEW? then register first.')">
                                <img src="/images/home/auto-bid.png" alt="">
                            </a>
                        </template>

                    </button>
                    <!--<button><img src="/images/home/hammer-bidding.png" alt=""></button>-->
                    <!--<button><img src="/images/home/auto-bid.png" alt=""></button>-->
                </div>
            </div>
            <div class="bottom-box"  v-if="auctions.up_time <= $root.serverTime && !auctions.is_close">
                <div>
                    Price Drop As YOU BID <br>
                    YOUR Price {{getPriceDrop(auctions)}}
                </div>
                <a :href="'/auction-buy/'+auctions.id">
                    <img src="/images/home/buy.png " alt="">
                </a>
            </div>

            <div class="bidderAmount">
                <div class="bidder"> Bidder Name</div>
                <div class="amount"> Cost</div>
            </div>
            <div class="userContainer">


                <div class="usersBidder" v-for="(item,index) in getItem(auctions.bids)">
                    <div>{{item.user ? item.user.username : ''}}</div>

                    <div>
                        {{(parseFloat(parseFloat(auctions.price_increase_every_bid) *
                    ((auctions.bids.length) - index))+parseFloat(auctions.starting_price)).toFixed(2)}}
                    </div>
                </div>


            </div>


        </div>


    </div>
</template>
<script src="./js/single-auction.js"></script>

