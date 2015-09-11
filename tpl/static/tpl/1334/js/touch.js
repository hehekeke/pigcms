function createPicMove(a, b, c) {
    var g = function(j) {
        return "string" == typeof j ? document.getElementById(j) : j
    };
    var d = function(j, l) {
        for (var k in l) {
            j[k] = l[k]
        }
        return j
    };
    var f = function(j) {
        return j.currentStyle || document.defaultView.getComputedStyle(j, null)
    };
    var i = function(l, j) {
        var k = Array.prototype.slice.call(arguments).slice(2);
        return function() {
            return j.apply(l, k.concat(Array.prototype.slice.call(arguments)))
        }
    };
    var e = {
        Quart: {
            easeOut: function(k, j, m, l) {
                return - m * ((k = k / l - 1) * k * k * k - 1) + j
            }
        },
        Back: {
            easeOut: function(k, j, n, m, l) {
                if (l == undefined) {
                    l = 1.70158
                }
                return n * ((k = k / m - 1) * k * ((l + 1) * k + l) + 1) + j
            }
        },
        Bounce: {
            easeOut: function(k, j, m, l) {
                if ((k /= l) < (1 / 2.75)) {
                    return m * (7.5625 * k * k) + j
                } else {
                    if (k < (2 / 2.75)) {
                        return m * (7.5625 * (k -= (1.5 / 2.75)) * k + 0.75) + j
                    } else {
                        if (k < (2.5 / 2.75)) {
                            return m * (7.5625 * (k -= (2.25 / 2.75)) * k + 0.9375) + j
                        } else {
                            return m * (7.5625 * (k -= (2.625 / 2.75)) * k + 0.984375) + j
                        }
                    }
                }
            }
        }
    };
    var h = function(k, n, m, l) {
        this._slider = g(n);
        this._container = g(k);
        this._timer = null;
        this._count = Math.abs(m);
        this._target = 0;
        this._t = this._b = this._c = 0;
        this.Index = 0;
        this.SetOptions(l);
        this.Auto = !!this.options.Auto;
        this.Duration = Math.abs(this.options.Duration);
        this.Time = Math.abs(this.options.Time);
        this.Pause = Math.abs(this.options.Pause);
        this.Tween = this.options.Tween;
        this.onStart = this.options.onStart;
        this.onFinish = this.options.onFinish;
        var j = !!this.options.Vertical;
        this._css = j ? "top": "left";
        var o = f(this._container).position;
        o == "relative" || o == "absolute" || (this._container.style.position = "relative");
        this._container.style.overflow = "hidden";
        this._slider.style.position = "relative";
        this.Change = this.options.Change ? this.options.Change: this._slider[j ? "offsetHeight": "offsetWidth"] / this._count
    };
    h.prototype = {
        SetOptions: function(j) {
            this.options = {
                Vertical: true,
                Auto: true,
                Change: 0,
                Duration: 50,
                Time: 10,
                Pause: 4000,
                onStart: function() {},
                onFinish: function() {},
                Tween: e.Quart.easeOut
            };
            d(this.options, j || {})
        },
        Run: function(j) {
            j == undefined && (j = this.Index);
            j < 0 && (j = this._count - 1) || j >= this._count && (j = 0);
            this._target = -Math.abs(this.Change) * (this.Index = j);
            this._t = 0;
            this._b = parseInt(f(this._slider)[this.options.Vertical ? "top": "left"]);
            this._c = this._target - this._b;
            this.onStart();
            this.Move()
        },
        Move: function() {
            clearTimeout(this._timer);
            if (this._c && this._t < this.Duration) {
                this.MoveTo(Math.round(this.Tween(this._t++, this._b, this._c, this.Duration)));
                this._timer = setTimeout(i(this, this.Move), this.Time)
            } else {
                this.MoveTo(this._target);
                this.Auto && (this._timer = setTimeout(i(this, this.Next), this.Pause))
            }
        },
        MoveTo: function(j) {
            this._slider.style[this._css] = j + "px"
        },
        Next: function() {
            this.Run(++this.Index)
        },
        Previous: function() {
            this.Run(--this.Index)
        },
        Stop: function() {
            clearTimeout(this._timer);
            this.MoveTo(this._target)
        }
    };
    return new h(a, b, c, {
        Vertical: false
    })
}