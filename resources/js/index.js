import { Application } from "stimulus"
import { definitionsFromContext } from "stimulus/webpack-helpers"
import * as Turbo from "@hotwired/turbo"
import Clipboard from "@johnnyfreeman/stimulus-clipboard"

Turbo.setProgressBarDelay(250)

const application = Application.start()
application.register("clipboard", Clipboard)
const context = require.context("./controllers", true, /\.js$/)
application.load(definitionsFromContext(context))

