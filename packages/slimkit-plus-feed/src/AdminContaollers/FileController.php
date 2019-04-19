<?php

declare(strict_types=1);

/*
 * +----------------------------------------------------------------------+
 * |                          ThinkSNS Plus                               |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2016-Present ZhiYiChuangXiang Technology Co., Ltd.     |
 * +----------------------------------------------------------------------+
 * | This source file is subject to enterprise private license, that is   |
 * | bundled with this package in the file LICENSE, and is available      |
 * | through the world-wide-web at the following url:                     |
 * | https://github.com/slimkit/plus/blob/master/LICENSE                  |
 * +----------------------------------------------------------------------+
 * | Author: Slim Kit Group <master@zhiyicx.com>                          |
 * | Homepage: www.thinksns.com                                           |
 * +----------------------------------------------------------------------+
 */

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentFeed\AdminControllers;

use Illuminate\Http\Request;
use Zhiyi\Plus\Http\Controllers\Controller;
use Zhiyi\Plus\Cdn\UrlManager as CdnUrlManager;
use Zhiyi\Plus\Models\FileWith as FileWithModel;
use Illuminate\Contracts\Routing\ResponseFactory as ResponseContract;

class FileController extends Controller
{
    /**
     * Get file.
     *
     * @param Request          $request
     * @param ResponseContract $response
     * @param CdnUrlManager    $cdn
     * @param FileWithModel    $file
     * @return mixed
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function show(Request $request, ResponseContract $response, CdnUrlManager $cdn, FileWithModel $file)
    {
        $file->load(['file']);
        $extra = array_filter([
            'width' => $request->query('w'),
            'height' => $request->query('h'),
            'quality' => $request->query('q'),
        ]);

        return $response->redirectTo(
            $cdn->make($file->file, $extra),
            302
        );
    }
}
