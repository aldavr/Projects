import { VideoPlayerAppPage } from './app.po';

describe('video-player-app App', () => {
  let page: VideoPlayerAppPage;

  beforeEach(() => {
    page = new VideoPlayerAppPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!');
  });
});
