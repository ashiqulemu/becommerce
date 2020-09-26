import moment from 'moment';
import {AuctionJS} from './components/js/auction'

export class Auction {
    constructor(auction, serverTime) {
        this.au = auction
        this.slotRunningCount = 0,
            this.serverTime = serverTime,
            this.currentDiffTime = '',
            this.bids = auction.bids,
            this.count = 0
    }

    startTimer() {
        var th = this
        var presentTime = $('#timer' + this.au.id).html()
        if(presentTime){

            var frontendTime = this.sendBackTime(presentTime)
            $('#timer' + this.au.id).html(frontendTime);

            if (frontendTime == "00:00:00" ) {
                this.closed()
            } else {
                var setTimeOutId= setTimeout(function () {
                    th.startTimer()
                }.bind(this), 1000);
                window.allAuctionSetTimout.push(setTimeOutId)

            }
        }


    }

    setTimerWithBid(bids) {
        var totalSlotCount = 0;

        for (var as = 0; as < this.au.slots.length; as++) {
            totalSlotCount += this.au.slots[as].slot_number
        }

        var addedTime = bids.length ? bids[bids.length - 1].created_at : this.au.up_time
        var offLoop = false
        var totalSlotNumber = 0
        this.slotRunningCount = bids.length > 1 ? this.slotRunningCount = bids.length - 1 : 0

        for (var s = 0; s < this.au.slots.length; s++) {
            if (offLoop) {
                break;
            }
            var currentSlotNumber = this.au.slots[s].slot_number
            totalSlotNumber += currentSlotNumber
            var currentDurationTime = this.au.slots[s].duration_time

            if (this.slotRunningCount < totalSlotCount) {

                if (totalSlotNumber > this.slotRunningCount) {

                    var diffTime = this.diffTime(addedTime, this.serverTime)
                    var [diffHour, diffMinute, diffsec] = diffTime.split(':')
                    var timeDifference = Math.abs(parseInt(diffHour)) + ':' +
                        Math.abs(parseInt(diffMinute)) + ':' + Math.abs(parseInt(diffsec))
                    var currentMiliSecondsDiff = this.convertMiliSeconds(currentDurationTime) -
                        this.convertMiliSeconds(timeDifference)
                    if (Math.sign(currentMiliSecondsDiff) != -1) {
                        this.currentDiffTime = this.miliSecondsToTime(currentMiliSecondsDiff)
                    } else {
                        this.closed()
                    }
                    offLoop = true
                    break;

                } else {

                    if (this.slotRunningCount >= totalSlotCount) {
                        this.closed()
                    }

                }
            } else {
                this.closed()
            }


        }
    }

    setTimerWithServerTime() {

        var addedTime = this.au.up_time
        var offLoop = false

        for (var s = 0; s < this.au.slots.length; s++) {
            if (offLoop) {
                break;
            }
            var currentSlotNumber = this.au.slots[s].slot_number
            var currentDurationTime = this.au.slots[s].duration_time

            for (var sn = 0; sn < currentSlotNumber; sn++) {

                this.slotRunningCount++
                addedTime = this.addTime(addedTime, currentDurationTime)
                if (moment(addedTime).format('YYYY-MM-DD HH:mm:ss') >
                    moment(this.serverTime).format('YYYY-MM-DD HH:mm:ss')) {

                    var diffTime = this.diffTime(this.serverTime, addedTime)

                    var [diffHour, diffMinute, diffsec] = diffTime.split(':')
                    this.currentDiffTime = Math.abs(parseInt(diffHour)) + ':' +
                        Math.abs(parseInt(diffMinute)) + ':' + Math.abs(parseInt(diffsec))
                    offLoop = true
                    break;

                } else {
                    var totalSlotCount = 0;
                    for (var as = 0; as < this.au.slots.length; as++) {
                        totalSlotCount += this.au.slots[as].slot_number
                    }
                    if (this.slotRunningCount >= totalSlotCount) {
                        this.closed()
                    }
                }
            }
        }
    }

    sendBackTime(presentTime) {
      if(presentTime != 'Calculating ...') {
          presentTime = '2020-05-04 '+presentTime
          presentTime = moment(presentTime, 'YYYY-MM-DD HH:mm:ss').subtract(1, 'seconds').format('HH:mm:ss')
      }

      return presentTime
    }

    closed() {
        if (!this.au.is_closed) {
            axios.post('/auction/update-status', {
                id: this.au.id
            }).then(res => {
                if (res.data.closed) {
                }
            })
        }
    }

    addTime(addWith, duration) {
        var [slotHour, slotMinute, slotsec] = duration.split(':')
        addWith = moment(addWith).add(slotHour, 'hours')
        addWith = moment(addWith).add(slotMinute, 'minutes')
        addWith = moment(addWith).add(slotsec, 'seconds')
        return addWith
    }

    diffTime(fromTime, toTime) {
        var a = moment(fromTime, "YYYY-MM-DD HH:mm:ss")
        var b = moment(toTime).format('YYYY-MM-DD HH:mm:ss')
        b = moment(b, "YYYY-MM-DD HH:mm:ss")

        var diffHour = a.diff(b, 'hours');
        var diffMinutes = a.diff(b, 'minutes');
        var diffSecconds = a.diff(b, 'second');

        var diffTimes = diffHour + ':' +
            parseInt(diffMinutes) % 60 + ':' +
            parseInt(diffSecconds) % 60
        return diffTimes
    }

    subTime(subWith, duration) {
        var [slotHour, slotMinute, slotsec] = duration.split(':')
        subWith = moment(subWith).add(slotHour, 'hours')
        subWith = moment(subWith).add(slotMinute, 'minutes')
        subWith = moment(subWith).add(slotsec, 'seconds')
        return subWith
    }


    convertMiliSeconds(data) {
        var [hrs, mins, secs] = data.split(':')
        return (parseInt(hrs * 60 * 60) + parseInt(mins * 60) + parseInt(secs)) * 1000
    }

    miliSecondsToTime(mili) {
        var miliSeconds = moment.duration(mili);
        var h = miliSeconds.hours();
        var m = miliSeconds.minutes();
        var s = miliSeconds.seconds();
        return h + ':' + m + ":" + s
    }



}




