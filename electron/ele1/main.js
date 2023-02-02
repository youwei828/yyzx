const { BrowserWindow, app } = require('electron')
const path = require('path')
app.whenReady().then(() => {
    const mainWindow = new BrowserWindow({
        width: 400,
        height: 300,
        alwaysOnTop: true,
        x: 1300,
        y: 200,
    })
    // 启动的时候打开开发者工具
    mainWindow.webContents.toggleDevTools()
    mainWindow.loadFile(path.resolve(__dirname, 'index.html'))
})
